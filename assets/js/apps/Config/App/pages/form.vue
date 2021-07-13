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
            <a type="button" class="btn btn-info" href="/config/app/form" title="Novo">
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
          storeName="formFieldsApp"
          :withoutCard="true"
          :apiResource="this.baseApi"
          :listUrl="'/config/app/list'"
          :schemaValidator="this.yupValidator"
        >
          <div class="row">
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label :for="id">ID</label>
                <InputText
                  class="form-control"
                  id="id"
                  type="text"
                  v-model="this.formFieldsApp.id"
                  disabled
                />
              </div>
            </div>
            <div class="col-12 col-md-9">
              <div class="form-group">
                <label v-bind:for="nome">Nome</label>
                <InputText
                  :class="
                    'form-control notuppercase ' +
                    (this.formFieldsAppErrors['nome'] ? 'is-invalid' : '')
                  "
                  id="nome"
                  type="text"
                  v-model="this.formFieldsApp['nome']"
                />
                <div class="invalid-feedback">
                  {{ this.formFieldsAppErrors["nome"] }}
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="UUID">UUID</label>
                <InputText
                  :class="
                    'form-control notuppercase ' +
                    (this.formFieldsAppErrors.UUID ? 'is-invalid' : '')
                  "
                  id="UUID"
                  type="text"
                  v-model="this.formFieldsApp.UUID"
                />
                <div class="invalid-feedback">
                  {{ this.formFieldsAppErrors.UUID }}
                </div>
              </div>
            </div>
          </div>
        </CrosierForm>

        <appConfigs v-if="this.formFieldsApp.id"></appConfigs>
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
  data() {
    return {
      titulo: "App",
      baseApi: "/api/core/config/app",
      yupValidator: {},
    };
  },
  async mounted() {
    this.yupValidator = yup.object().shape({
      nome: yup.string().required().typeError(),
    });
  },
  computed: {
    formFieldsApp() {
      return this.$store.getters.formFieldsApp;
    },
    formFieldsAppErrors() {
      return this.$store.state.formFieldsAppErrors;
    },
  },
};
</script>
