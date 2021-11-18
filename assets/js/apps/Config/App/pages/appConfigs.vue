<template>
  <ConfirmPopup></ConfirmPopup>
  <div class="card mt-2">
    <div class="card-header">
      <div class="row">
        <div class="col-md-8 card-title h3">Configurações</div>
        <div class="col-md-4 text-right">
          <Button
            icon="fas fa-file"
            class="mr-2 p-button-rounded p-button-sm p-button-info dt-sm-bt"
            v-tooltip="'Novo'"
            @click="this.novoAppConfig()"
          />
        </div>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-striped table-hover display compact">
        <thead>
          <tr>
            <th scope="col">Chave</th>
            <th scope="col">Valor</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-bind:key="k" v-for="(k, r) in this.tableData">
            <td>{{ r.chave }}</td>
            <td>
              <vue-json-editor
                readonly="readonly"
                style="width: 600px; height: 400px"
                v-if="this.exibeJson(r)"
                :value="r.valor"
                :expandedOnStart="true"
              />

              <InputText
                readonly="readonly"
                v-if="!this.exibeJson(r)"
                class="form-control notuppercase"
                id="valor"
                type="text"
                v-model="r.valor"
              />
            </td>
            <td class="text-right">
              <div class="row d-flex justify-content-end">
                <Button
                  icon="pi pi-pencil"
                  class="mr-2 p-button-rounded p-button-sm p-button-info dt-sm-bt"
                  v-tooltip="'Editar'"
                  @click="this.editarAppConfig(r.id)"
                />
                <Button
                  icon="pi pi-trash"
                  class="mr-2 p-button-rounded p-button-sm p-button-danger dt-sm-bt"
                  v-tooltip="'Deletar'"
                  @click="deletarAppConfig($event, r.id)"
                />
              </div>
              <div class="row mt-1 d-flex justify-content-end">
                <span class="badge badge-info">
                  {{ new Date(r.updated).toLocaleString() }}
                </span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <appConfigForm />
</template>

<script>
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import axios from "axios";
import ConfirmPopup from "primevue/confirmpopup";
import vueJsonEditor from "vue-json-editor";
import { api } from "crosier-vue";
import appConfigForm from "./appConfigForm";

export default {
  name: "appConfigs",
  components: { InputText, vueJsonEditor, Button, ConfirmPopup, appConfigForm },
  data() {
    return {
      baseApi: "/api/core/config/appConfig",
      loading: false,
      tableData: null,
      totalRecords: 0,
      appConfigsFormFieldss: {},
    };
  },
  async mounted() {
    this.loading = true;

    const params = {
      headers: {
        "Content-Type": "application/json;charset=UTF-8",
      },
    };

    const response = await axios.get(`${this.baseApi}?appUUID=${this.formFieldsApp.UUID}`, params);

    this.totalRecords = response.data["hydra:totalItems"];
    this.tableData = response.data["hydra:member"];
    this.loading = false;
  },
  computed: {
    formFieldsApp() {
      return this.$store.state.formFieldsApp;
    },
  },
  methods: {
    exibeJson(r) {
      return r?.isJson || r?.chave?.includes("json");
    },
    novoAppConfig() {
      this.$store.commit("setFormFieldsAppConfig", {
        appUUID: this.formFieldsApp.UUID,
      });
      this.$store.state.displayFormAppConfigModal = true;
    },
    async editarAppConfig(id) {
      const response = await api.get({
        apiResource: `/api/core/config/appConfig/${id}`,
      });
      if (response.data) {
        this.$store.commit("setFormFieldsAppConfig", response.data);
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
    deletarAppConfig(event, id) {
      this.$confirm.require({
        target: event.currentTarget,
        message: `Confirmar deleção do reggistro?`,
        icon: "pi pi-exclamation-triangle",
        accept: () => {
          console.log(`delete ${id}`);
        },
        reject: () => {
          // callback to execute when user rejects the action
        },
      });
    },
  },
};
</script>
