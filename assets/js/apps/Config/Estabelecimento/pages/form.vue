<template>
  <Toast position="bottom-right" class="mt-5" />
  <CrosierFormS @submitForm="this.submitForm" titulo="Estabelecimentos">
    <div class="form-row">
      <CrosierInputInt label="Id" col="2" id="id" v-model="this.fields.id" :disabled="true" />

      <CrosierInputInt
        label="Código"
        col="2"
        id="codigo"
        v-model="this.fields.codigo"
        :error="this.formErrors.codigo"
      />

      <CrosierInputText
        label="Descrição"
        col="5"
        id="nome"
        v-model="this.fields.descricao"
        :error="this.formErrors.descricao"
      />

      <CrosierDropdown label="Concreto" col="2" id="concreto" v-model="this.fields.concreto" />
    </div>
  </CrosierFormS>
</template>

<script>
import Toast from "primevue/toast";
import * as yup from "yup";
import {
  CrosierFormS,
  submitForm,
  CrosierDropdown,
  CrosierInputText,
  CrosierInputInt,
} from "crosier-vue";
import { mapGetters, mapMutations } from "vuex";

export default {
  components: {
    Toast,
    CrosierFormS,
    CrosierDropdown,
    CrosierInputText,
    CrosierInputInt,
  },

  data() {
    return {
      criarVincularFields: false,
      schemaValidator: {},
    };
  },

  async mounted() {
    this.setLoading(true);

    this.$store.dispatch("loadData");
    this.schemaValidator = yup.object().shape({
      codigo: yup.number().required().typeError(),
      descricao: yup.string().required().typeError(),
      concreto: yup.boolean().required().typeError(),
    });

    this.setLoading(false);
  },

  methods: {
    ...mapMutations(["setLoading", "setFields", "setFieldsErrors"]),

    async submitForm() {
      this.setLoading(true);
      await submitForm({
        apiResource: "/api/cfg/estabelecimento",
        schemaValidator: this.schemaValidator,
        $store: this.$store,
        formDataStateName: "fields",
        $toast: this.$toast,
        // fnBeforeSave: (formData) => {
        //
        // },
      });
      this.setLoading(false);
    },
  },

  computed: {
    ...mapGetters({ fields: "getFields", formErrors: "getFieldsErrors" }),
  },
};
</script>
