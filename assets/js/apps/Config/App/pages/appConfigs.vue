<template>
  <ConfirmDialog></ConfirmDialog>
  <div class="card mt-2">
    <div class="card-header">
      <div class="row">
        <h4 class="col-md-8 card-title">Configurações</h4>
        <div class="col-md-4 text-right">
          <button type="button" class="btn btn-primary" @click="this.novoAppConfig()">
            <i class="fas fa-file"></i>
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-striped display compact">
        <thead>
          <tr>
            <th scope="col">Chave</th>
            <th scope="col">Valor</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody v-if="this.appConfigs">
          <tr v-bind:key="k" v-for="(r, k) in this.appConfigs">
            <td>{{ r.chave }}</td>
            <td>
              <div
                style="max-width: 500px; max-height: 350px; overflow: scroll"
                v-if="this.exibeJson(r)"
              >
                <pre>{{ r.valor }}</pre>
              </div>

              <div style="max-width: 500px" v-if="!this.exibeJson(r)">
                <InputText
                  readonly="readonly"
                  v-if="!this.exibeJson(r)"
                  class="form-control notuppercase"
                  id="valor"
                  type="text"
                  v-model="r.valor"
                />
              </div>
            </td>
            <td class="text-right">
              <div class="d-flex justify-content-end">
                <a
                  role="button"
                  class="btn btn-outline-primary btn-sm"
                  title="Editar registro"
                  @click="this.editarAppConfig(r.id)"
                  ><i class="fas fa-wrench" aria-hidden="true"></i
                ></a>
                <a
                  role="button"
                  class="btn btn-outline-danger btn-sm ml-1"
                  title="Deletar registro"
                  @click="this.deletarAppConfig(r.id)"
                  ><i class="fas fa-trash" aria-hidden="true"></i
                ></a>
              </div>
              <div class="d-flex justify-content-end mt-1">
                <span
                  v-if="r.updated"
                  class="badge badge-info"
                  title="Última alteração do registro"
                >
                  {{ new Date(r.updated).toLocaleString() }}
                </span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>

      <appConfigForm />
    </div>
  </div>
</template>

<script>
import ConfirmDialog from "primevue/confirmdialog";
import { api } from "crosier-vue";
import { mapGetters, mapMutations } from "vuex";
import InputText from "primevue/inputtext";
import appConfigForm from "./appConfigForm";

export default {
  name: "appConfigs",
  components: { ConfirmDialog, appConfigForm, InputText },

  data() {
    return {
      baseApi: "/api/cfg/appConfig",
      appConfigsFormFieldss: {},
    };
  },

  methods: {
    ...mapMutations(["setLoading", "setFields", "setFieldsErrors", "setFieldsAppConfig"]),

    exibeJson(r) {
      return r?.isJson || r?.chave?.includes("json");
    },

    novoAppConfig() {
      this.setFieldsAppConfig({ appUUID: this.fields.UUID });
      this.$store.state.displayFormAppConfigModal = true;
    },

    async editarAppConfig(id) {
      const response = await api.get({
        apiResource: `/api/cfg/appConfig/${id}`,
      });
      if (response.data) {
        if (response.data.isJson) {
          try {
            response.data.valor = JSON.parse(response.data.valor);
          } catch (e) {
            console.error("Erro ao executar parse para response.data.valor");
          }
        }

        this.setFieldsAppConfig(response.data);
        this.$store.state.displayFormAppConfigModal = true;
      } else {
        this.$toast.add({
          severity: "error",
          summary: "Mensagem de erro",
          detail: "Erro",
          life: 3000,
        });
      }
    },

    deletarAppConfig(id) {
      this.$confirm.require({
        acceptLabel: "Sim",
        rejectLabel: "Não",
        message: "Confirmar a operação?",
        header: "Atenção!",
        icon: "pi pi-exclamation-triangle",
        accept: async () => {
          this.setLoading(true);
          try {
            const deleteUrl = `${this.baseApi}/${id}`;
            const rsDelete = await api.delete(deleteUrl);
            if (!rsDelete) {
              throw new Error("rsDelete n/d");
            }
            if (rsDelete?.status === 204) {
              this.$toast.add({
                group: "mainToast",
                severity: "success",
                summary: "Sucesso",
                detail: "Registro deletado com sucesso",
                life: 5000,
              });
              this.$store.dispatch("loadAppConfigs");
            } else if (rsDelete?.data && rsDelete.data["hydra:description"]) {
              throw new Error(`status !== 204: ${rsDelete?.data["hydra:description"]}`);
            } else if (rsDelete?.statusText) {
              throw new Error(`status !== 204: ${rsDelete?.statusText}`);
            } else {
              throw new Error("Erro ao deletar (erro n/d, status !== 204)");
            }
          } catch (e) {
            console.error(e);
            this.$toast.add({
              group: "mainToast",
              severity: "error",
              summary: "Erro",
              detail: "Ocorreu um erro ao deletar",
              life: 5000,
            });
          }
          this.setLoading(false);
        },
      });
    },
  },

  computed: {
    ...mapGetters({ fields: "getFields", errors: "getFieldsErrors", appConfigs: "getAppConfigs" }),
  },
};
</script>
