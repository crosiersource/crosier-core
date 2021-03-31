<template>
  <div class="container">
    <div class="card" style="margin-bottom: 50px">
      <div class="card-header">
        <div class="d-flex flex-wrap align-items-center">
          <div class="mr-1">
            <h3>{{ titulo }}</h3>
            <h6 v-if="subtitulo">{{ this.subtitulo }}</h6>
          </div>
          <div class="d-sm-flex flex-nowrap ml-auto">
            <Button
              class="p-button-help p-button-text"
              icon="pi pi-arrow-left"
              label="voltar pra lista"
              @click="this.redirectList()"
            />
          </div>
        </div>
      </div>
      <div class="card-body">
        <CrosierForm
          storeName="formApp"
          :withoutCard="true"
          :apiResource="this.baseApi"
          :listUrl="'/config/app/list'"
          :schemaValidator="this.schemaValidator"
          :titulo="this.titulo"
          :subtitulo="this.subtitulo"
          @handleSubmitForm="this.handleSubmitForm()"
          ref="form"
        >
          <div class="row">
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label :for="id">ID</label>
                <InputText
                  class="form-control"
                  id="id"
                  type="text"
                  v-model="this.$store.getters.getFormApp.id"
                  disabled
                />
              </div>
            </div>
            <div class="col-12 col-md-9">
              <label v-bind:for="nome">Nome</label>
              <InputText
                :class="
                  'form-control notuppercase ' +
                  (this.$store.getters.getFormAppErrors.nome
                    ? 'is-invalid'
                    : '')
                "
                id="nome"
                type="text"
                v-model="this.$store.getters.getFormApp.nome"
              />
              <div class="invalid-feedback">
                {{ this.$store.getters.getFormAppErrors.nome }}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <label for="UUID">UUID</label>
              <InputText
                :class="
                  'form-control notuppercase ' +
                  (this.$store.getters.getFormAppErrors.UUID
                    ? 'is-invalid'
                    : '')
                "
                id="UUID"
                type="text"
                v-model="this.$store.getters.getFormApp.UUID"
              />
              <div class="invalid-feedback">
                {{ this.$store.getters.getFormAppErrors.UUID }}
              </div>
            </div>
          </div>
        </CrosierForm>

        <appConfigs v-if="this.$store.getters.getFormApp.UUID"></appConfigs>
      </div>
    </div>
  </div>

  <pre>{{ this.$store.state }}</pre>
</template>

<script>
import InputText from "primevue/inputtext";
import * as yup from "yup";
import CrosierForm from "@/components/crosierForm";
import appConfigs from "./appConfigs";

export default {
  name: "app_form",
  components: { CrosierForm, InputText, appConfigs },
  async mounted() {
    this.schemaValidator = yup.object().shape({
      nome: yup.string().required().typeError(),
      UUID: yup.string().required().typeError(),
    });
  },
  data() {
    return {
      titulo: "Aplicativo",
      subtitulo: "Configurações",
      baseApi: "/api/core/config/app",
      formErrors: [],
      schemaValidator: {},
    };
  },
  methods: {
    async handleSubmitForm() {
      await this.$refs.form.submitForm(this.$store.state.formApp);
      this.formFields = this.$store.state.formFields;
    },
  },
};
</script>
