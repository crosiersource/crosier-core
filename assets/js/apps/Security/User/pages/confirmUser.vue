<template>
  <Toast position="bottom-right" class="mt-5" />
  <CrosierBlock :loading="this.loading" />

  <div class="d-flex p-2">
    <div class="card mx-auto" style="max-width: 650px">
      <img
        class="card-img-top"
        :src="this.serverParams.crosierLogo"
        height="36"
        style="max-width: 220px; margin: 20px"
      />

      <form @submit.prevent="this.submitForm">
        <fieldset :disabled="this.loading">
          <div class="card-body">
            <h5 class="card-title">Recuperação de senha</h5>

            <div v-if="!this.emailEnviadoOuNao">
              <div class="form-row">
                <CrosierInputText
                  label="Informe seu e-mail"
                  inputClass="lowercase"
                  id="confirmUser"
                  v-model="this.fields.confirmUser"
                />
              </div>
              <div class="form-row">
                <div class="col text-right">
                  <button
                    class="btn btn-sm btn-primary"
                    style="width: 12rem"
                    type="button"
                    icon="fas fa-save"
                    @click="this.confirmarUser"
                  >
                    <i class="far fa-check-circle"></i> Confirmar
                  </button>
                </div>
              </div>
            </div>

            <p v-if="this.emailEnviadoOuNao">
              Um e-mail será enviado caso o usuário exista no sistema.
            </p>
          </div>
        </fieldset>
      </form>
    </div>
  </div>

  <div class="form-row"></div>
</template>

<script>
import Toast from "primevue/toast";
import * as yup from "yup";
import { CrosierInputText, CrosierBlock, SetFocus, submitForm } from "crosier-vue";
import { mapGetters, mapMutations } from "vuex";

export default {
  name: "ativarLogin",

  components: {
    CrosierInputText,
    CrosierBlock,
    Toast,
  },

  data() {
    return {
      schemaValidator: {},
      serverParams: {},
      emailEnviadoOuNao: false,
    };
  },

  async mounted() {
    this.setLoading(true);

    try {
      this.serverParams = JSON.parse(document.getElementById("serverParams").innerHTML);
    } catch (e) {
      console.error("JSON.parse ... serverParams");
    }

    this.schemaValidator = yup.object().shape({
      confirmUser: yup.string().required().typeError(),
    });

    SetFocus("confirmUser", 1000);

    this.setLoading(false);
  },

  methods: {
    ...mapMutations(["setLoading", "setFields", "setFieldsErrors"]),

    async confirmarUser() {
      this.setLoading(true);
      try {
        const rs = await submitForm({
          apiResource: `/api/sec/user/recuperaSenha/confirmarUser`,
          schemaValidator: this.schemaValidator,
          $store: this.$store,
          formDataStateName: "fields",
          $toast: this.$toast,
          commitFormDataAfterSave: false,
          setUrlId: false,
          msgSucesso: "Um e-mail será enviado caso o usuário exista no sistema.",
          msgErro: "Ocorreu um erro ao processar.",
          // fnBeforeSave: (formData) => {
          //   // ...
          // },
        });
        console.log(rs);
        if (rs?.data?.RESULT === "OK") {
          this.emailEnviadoOuNao = true;
        } else {
          console.error(rs);
          this.$toast.add({
            severity: "error",
            summary: "Erro",
            detail: "Não foi possível testar a confirmação.",
            life: 5000,
          });
        }
      } catch (e) {
        console.error(e);
      }

      this.setLoading(false);
    },
  },

  computed: {
    ...mapGetters({
      loading: "isLoading",
      fields: "getFields",
      errors: "getFieldsErrors",
    }),
  },
};
</script>
