<template>
  <Toast position="bottom-right" class="mt-5" />
  <CrosierFormS @submitForm="this.submitForm" titulo="App">
    <div class="form-row">
      <CrosierInputInt label="Id" col="3" id="id" v-model="this.fields.id" :disabled="true" />

      <CrosierInputText
        inputClass="lowercase"
        label="UUID"
        col="3"
        id="nome"
        v-model="this.fields.UUID"
        :error="this.errors.UUID"
      />

      <CrosierInputText
        label="Nome"
        col="6"
        id="nome"
        v-model="this.fields.nome"
        :error="this.errors.nome"
      />
    </div>
    <div class="form-row">
      <CrosierInputTextarea
        label="Obs"
        id="obs"
        v-model="this.fields.obs"
        :error="this.errors.obs"
      />
    </div>

    <appConfigs v-if="this.fields.id"></appConfigs>
  </CrosierFormS>
</template>

<script>
import Toast from "primevue/toast";
import * as yup from "yup";
import {
  CrosierFormS,
  CrosierInputInt,
  CrosierInputText,
  CrosierInputTextarea,
  submitForm,
} from "crosier-vue";
import { mapGetters, mapMutations } from "vuex";
import appConfigs from "./appConfigs";

export default {
  components: {
    Toast,
    CrosierFormS,
    CrosierInputText,
    CrosierInputTextarea,
    CrosierInputInt,
    appConfigs,
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
        apiResource: "/api/cfg/app",
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
    ...mapGetters({ fields: "getFields", errors: "getFieldsErrors" }),
  },
};
</script>
