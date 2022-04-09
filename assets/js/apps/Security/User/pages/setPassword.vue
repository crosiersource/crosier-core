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

      <form v-if="!this.enviado" @submit.prevent="this.submitForm">
        <fieldset :disabled="this.loading">
          <div class="card-body">
            <h5 class="card-title">Informe sua nova senha</h5>

            <div class="form-row">
              <div class="col-12">
                <div class="form-group">
                  <label for="password">Senha</label>
                  <div class="input-group">
                    <Password
                      inputClass="notuppercase"
                      :class="'form-control ' + (this.error ? 'is-invalid' : '')"
                      id="password"
                      v-model="this.fields.password"
                      weakLabel="Fraco"
                      mediumLabel="Médio"
                      strongLabel="Forte"
                      :toggleMask="true"
                    />
                  </div>
                  <div class="invalid-feedbackk blink" v-show="this.errors.password">
                    {{ this.errors.password }}
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-12">
                <div class="form-group">
                  <label for="password2">Repita a Senha</label>
                  <div class="input-group">
                    <Password
                      inputClass="notuppercase"
                      :class="'form-control ' + (this.error ? 'is-invalid' : '')"
                      id="password2"
                      v-model="this.fields.password2"
                      weakLabel="Fraco"
                      mediumLabel="Médio"
                      strongLabel="Forte"
                      :toggleMask="true"
                    />
                  </div>
                  <div class="invalid-feedbackk blink" v-show="this.errors.password2">
                    {{ this.errors.password2 }}
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col text-right">
                <button
                  class="btn btn-sm btn-primary"
                  style="width: 12rem"
                  type="submit"
                  icon="fas fa-save"
                >
                  <i class="fas fa-save"></i> Enviar
                </button>
              </div>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>

  <div class="form-row"></div>
</template>

<script>
import Password from "primevue/password";
import Toast from "primevue/toast";
import * as yup from "yup";
import { SetFocus, submitForm } from "crosier-vue";
import { mapGetters, mapMutations } from "vuex";

export default {
  name: "setPassword",

  components: {
    Password,
    Toast,
  },

  data() {
    return {
      schemaValidator: {},
      serverParams: {},
      confirmandoUser: true,
      emailEnviadoOuNao: false,
      setandoPassword: false,
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
      password: yup.string().required().typeError(),
      password2: yup.string().required().typeError(),
    });

    SetFocus("password", 1000);

    this.setLoading(false);
  },

  methods: {
    ...mapMutations(["setLoading", "setFields", "setFieldsErrors"]),

    async submitForm() {
      this.setLoading(true);
      const rs = await submitForm({
        apiResource: `/sec/user/recuperaSenha/setPassword`,
        schemaValidator: this.schemaValidator,
        $store: this.$store,
        formDataStateName: "fields",
        $toast: this.$toast,
        commitFormDataAfterSave: false,
        setUrlId: false,
        fnBeforeSave: (formData) => {
          formData.token = this.serverParams.token;
          formData.userId = this.serverParams.id;

          if (formData.password !== formData.password2) {
            this.$toast.add({
              severity: "error",
              summary: "Erro",
              detail: "As senhas não coincidem",
              life: 5000,
            });
            throw new Error("passwords n/i");
          }
        },
      });
      if (rs?.data?.RESULT === "OK") {
        window.location = `/login?username=${rs.data.DATA.username}`;
      } else {
        this.$toast.add({
          severity: "error",
          summary: "Erro",
          detail: "Não foi possível alterar sua senha.",
          life: 5000,
        });
      }

      this.setLoading(false);
    },
  },

  computed: {
    ...mapGetters({
      fields: "getFields",
      errors: "getFieldsErrors",
      loading: "isLoading",
    }),
  },
};
</script>
