<template>
  <Toast position="bottom-right" class="mt-5" />
  <CrosierBlock :loading="this.loading" />
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h3>Listas de Mensagens</h3>
        <h6>Selecione as quais deseja receber mensagens</h6>
      </div>
      <div class="card-body">
        <ul v-for="listaPush of this.listasPush" :key="listaPush.chave">
          <li class="p-field-checkbox">
            <Checkbox
              :id="listaPush.chave"
              name="listaPush"
              :value="listaPush.chave"
              v-model="this.auxs.assinaturas"
            />

            <label :for="listaPush.chave">{{ listaPush.nomeLista }}</label>
          </li>
        </ul>
        <div class="row mt-3">
          <div class="col text-right">
            <button
              class="btn btn-sm btn-primary"
              style="width: 12rem"
              type="button"
              @click="submitForm"
            >
              <i class="fas fa-save"></i> Salvar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters, mapMutations } from "vuex";
import Checkbox from "primevue/checkbox";
import { api, CrosierBlock } from "crosier-vue";
import Toast from "primevue/toast";

export default {
  name: "assinatura",
  components: {
    Checkbox,
    CrosierBlock,
    Toast,
  },

  data() {
    return {};
  },

  async mounted() {
    this.setLoading(true);
    await this.loadListasPush();
    this.setLoading(false);
  },

  methods: {
    ...mapMutations(["setLoading"]),
    ...mapActions(["loadListasPush"]),

    async submitForm() {
      this.setLoading(true);

      try {
        const rs = await api.post("/api/core/config/pushMessage/assinarListaPush", {
          assinaturas: this.auxs.assinaturas,
        });
        if (rs.status === 200) {
          this.$toast.add({
            severity: "success",
            summary: "Success",
            detail: "Registro salvo com sucesso",
            life: 5000,
          });
        } else {
          throw new Error();
        }
      } catch (e) {
        console.error(e);
        this.$toast.add({
          severity: "error",
          summary: "Erro",
          detail: "Ocorreu um erro ao efetuar a operação",
          life: 5000,
        });
      }

      this.setLoading(false);
    },
  },

  computed: {
    ...mapGetters({
      loading: "isLoading",
      listasPush: "getListasPush",
      auxs: "getAuxs",
    }),
  },
};
</script>
<style>
ul {
  list-style-type: none;
}
</style>
