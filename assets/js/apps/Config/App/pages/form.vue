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
            <a
              type="button"
              class="btn btn-info"
              href="/config/app/form"
              title="Novo"
            >
              <i class="fas fa-file" aria-hidden="true"></i>
            </a>
            <a
              role="button"
              class="btn btn-outline-secondary"
              href="/config/app/list"
              title="Listar"
            >
              <i class="fas fa-list"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <CrosierForm
          formDataName="formApp"
          :withoutCard="true"
          :apiResource="this.baseApi"
          :listUrl="'/config/app/list'"
          :schemaValidator="this.yupValidator"
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
                  v-model="this.formApp.id"
                  disabled
                />
              </div>
            </div>
            <div class="col-12 col-md-9">
              <label v-bind:for="nome">Nome</label>
              <InputText
                :class="
                  'form-control notuppercase ' +
                  (this.formAppErrors['nome'] ? 'is-invalid' : '')
                "
                id="nome"
                type="text"
                v-model="this.formApp['nome']"
              />
              <div class="invalid-feedback">
                {{ this.formAppErrors["nome"] }}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <label for="UUID">UUID</label>
              <InputText
                :class="
                  'form-control notuppercase ' +
                  (this.formAppErrors.UUID ? 'is-invalid' : '')
                "
                id="UUID"
                type="text"
                v-model="this.formApp.UUID"
              />
              <div class="invalid-feedback">
                {{ this.formAppErrors.UUID }}
              </div>
            </div>
          </div>
        </CrosierForm>

        <appConfigs v-if="this.formApp.id"></appConfigs>
      </div>
    </div>
  </div>

  <pre>{{ this.$root }}</pre>
</template>

<script>
import InputText from "primevue/inputtext";
import * as yup from "yup";
import CrosierForm from "@/components/crosierForm";
import Button from "primevue/button";
import appConfigs from "./appConfigs";

export default {
  name: "app_form",
  components: { CrosierForm, InputText, appConfigs, Button },
  async mounted() {
    this.formApp = {
      nome: null,
      UUID: null,
    };
    this.formAppErrors = { ...this.formApp };
    this.yupValidator = { ...this.formApp };
    this.yupValidator.nome = yup.string().required().typeError();
    // this.yupValidator.UUID = yup.string().required().typeError();
    this.yupValidator = yup.object().shape(this.yupValidator);
  },
  data() {
    return {
      titulo: "Aplicativo",
      subtitulo: "Configurações",
      baseApi: "/api/core/config/app",
      formApp: [],
      formAppErrors: [],
      formAppConfig: [],
      formAppConfigErrors: [],
      displayFormAppConfigModal: false,
      yupValidator: {},
    };
  },
  methods: {
    async handleSubmitForm() {},
  },
};
</script>
