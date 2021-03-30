<template>
  <CrosierForm
    :apiResource="this.baseApi"
    :listUrl="'/cln/comissionamento/list'"
    :schemaValidator="this.schemaValidator"
    :titulo="this.titulo"
    :subtitulo="this.subtitulo"
    @handleSubmitForm="this.handleSubmitForm()"
    ref="form"
  >
    <div class="form-row">
      <div class="col-md-2">
        <label :for="id">ID</label>
        <InputText
          class="form-control"
          id="id"
          type="text"
          v-model="this.stored_formFields.id"
          disabled
        />
      </div>
      <div class="col-md-7">
        <label v-bind:for="descricao">Descrição</label>
        <InputText
          :class="
            'form-control ' +
            (this.stored_formErrors['descricao'] ? 'is-invalid' : '')
          "
          id="descricao"
          type="text"
          v-model="this.stored_formFields.descricao"
        />
        <div class="invalid-feedback">
          {{ this.stored_formErrors["descricao"] }}
        </div>
      </div>
      <div class="col-md-3">
        <label for="ativo">Status</label>
        <Dropdown
          :class="
            'form-control ' +
            (this.stored_formErrors['ativo'] ? 'is-invalid' : '')
          "
          inputId="ativo"
          v-model="this.stored_formFields.ativo"
          :options="this.dropdownOptions.statusOptions"
          optionLabel="name"
          optionValue="value"
          placeholder="Selecione o ativo"
        />
        <div class="invalid-feedback">
          {{ this.stored_formErrors["ativo"] }}
        </div>
      </div>
    </div>
    <div class="form-row mt-4">
      <div class="col-md-12">
        <label for="jsonData">Json Data</label>
        <vue-json-editor
          :value="this.stored_formFields.jsonData"
          v-model="this.stored_formFields.jsonData"
          :expandedOnStart="true"
          @json-change="
            (value) => {
              this.stored_formFields.jsonData = value;
            }
          "
        ></vue-json-editor>
      </div>
    </div>
  </CrosierForm>
</template>

<script>
import InputText from "primevue/inputtext";
import Dropdown from "primevue/dropdown";
import * as yup from "yup";
import CrosierForm from "@/components/crosierForm";
import vueJsonEditor from "vue-json-editor";

export default {
  name: "comissionamento_form",
  components: { CrosierForm, InputText, Dropdown, vueJsonEditor },
  async mounted() {
    this.schemaValidator = yup.object().shape({
      descricao: yup.string().required().typeError(),
      ativo: yup.boolean().required().typeError(),
    });
  },
  data() {
    return {
      titulo: "Comissionamento",
      subtitulo: "Cadastro",
      baseApi: "/api/clin/comissionamento",
      dropdownOptions: {
        statusOptions: [
          { name: "Selecione", value: null },
          { name: "Ativo", value: true },
          { name: "Inativo", value: false },
        ],
      },
      formErrors: [],
      schemaValidator: {},
    };
  },
  methods: {
    async handleSubmitForm() {
      await this.$refs.form.submitForm(this.stored_formFields);
      this.formFields = this.$store.state.formFields;
    },
  },
  computed: {
    stored_formFields() {
      return this.$store.state.formFields;
    },
    stored_formErrors() {
      return this.$store.state.formErrors;
    },
  },
};
</script>

<style>
.jsoneditor-vue {
  height: 300px;
}
</style>
