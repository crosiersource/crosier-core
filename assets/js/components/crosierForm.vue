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
        <form @submit.prevent="this.$emit('handleSubmitForm')">
          <slot></slot>
          <div class="row mt-3">
            <div class="col text-right">
              <Button label="Salvar" type="submit" icon="fas fa-save" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <Toast class="mt-5" />
</template>

<script>
import Button from "primevue/button";
import Toast from "primevue/toast";
import { postEntityData } from "@/services/ApiPostService";
import { putEntityData } from "@/services/ApiPutService";
import { fetchTableData } from "@/services/ApiDataFetchService";

export default {
  name: "CrosierForm",
  components: {
    Button,
    Toast,
  },
  props: {
    titulo: {
      type: String,
      required: true,
    },
    subtitulo: {
      type: String,
      required: false,
    },
    listUrl: {
      type: String,
      required: false,
    },
    apiResource: {
      type: String,
      required: true,
    },
    schemaValidator: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      formErrors: {},
    };
  },
  async mounted() {
    // verify if id is set.
    // and if found the id then set the register in the store
    // the stored fields are reflected in the form
    // else if not found then redirected to empty form
    const uri = window.location.search.substring(1);
    const params = new URLSearchParams(uri);
    if (params.get("id")) {
      try {
        const response = await fetchTableData({
          apiResource: `${this.apiResource}/${params.get("id")}`,
        });
        if (response.data.id) {
          this.$store.commit("setFormFields", response.data);
        } else {
          throw new Error("Id não encontrado.");
        }
      } catch (err) {
        console.log(err);
      }
    }
  },
  methods: {
    async submitForm() {
      // local const values receive stored fields that are prefetched or that is typed by users
      // formErrors are setted empty to clean.
      // call yup validator, and if is valid than make an api call (post or put, depedding of id is setted or not)
      // if response ok than store the values of response and redirect to edit form with id setted in the url
      // if yup validation fails then set the errors on store (that is auto reflected in the form)
      const values = this.$store.state.formFields;
      this.formErrors = [];
      this.$store.commit("setFormErrors", []);

      try {
        const validated = await this.schemaValidator.validate(values, {
          abortEarly: false,
        });

        let response;
        if (values.id) {
          response = await putEntityData(
            `${this.apiResource}/${values.id}`,
            JSON.stringify(validated)
          );
        } else {
          response = await postEntityData(
            this.apiResource,
            JSON.stringify(validated)
          );
        }

        if ([200, 201].includes(response.status)) {
          this.$store.commit("setFormFields", response.data);
          window.history.pushState("form", "id", `?id=${response.data.id}`);
          this.showSuccess("Salvo com sucesso!");
        }
      } catch (err) {
        this.$store.commit("setFormFields", values);
        err.inner?.forEach((element) => {
          this.formErrors[element.path] = element.message ?? "Valor inválido";
        });

        this.$store.commit("setFormErrors", this.formErrors);

        this.showError("Não foi possível salvar!");
        console.log(err.message);
      }
    },
    redirectForm(id = "") {
      window.location.href = `form${id ? `?id=${id}` : ""}`;
    },
    redirectList() {
      window.location.href = this.listUrl;
    },
    showSuccess(message) {
      this.$toast.add({
        severity: "success",
        summary: "Mensagem de sucesso",
        detail: message,
        life: 3000,
      });
    },
    showError(message) {
      this.$toast.add({
        severity: "error",
        summary: "Mensagem de erro",
        detail: message,
        life: 3000,
      });
    },
  },
};
</script>
