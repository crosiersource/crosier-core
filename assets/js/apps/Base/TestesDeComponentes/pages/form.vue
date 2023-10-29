<template>
  <Toast position="bottom-right" class="mt-5" />

  <ConfirmDialog />

  <TheDialog />

  <div class="container">
    <div class="form-row">
      <CrosierInputInt label="Id" col="3" id="id" v-model="this.fields.id" :disabled="true" />

      <CrosierInputText
        inputClass="lowercase"
        label="UUID"
        col="3"
        id="UUID"
        v-model="this.fields.UUID"
        :error="this.errors.UUID"
      />

      <CrosierInputText
        label="Nome"
        inputClass="lowercase"
        col="6"
        id="nome"
        v-model="this.fields.nome"
        :error="this.errors.nome"
      />
    </div>

    <div class="form-row">
      <CrosierCurrency label="Valorrr" id="valorCredito2" v-model="this.valorCredito2" col="11" />

      <button
        type="button"
        @click="this.$store.state.exibirDialog = true"
        class="btn btn-primary col-1"
      >
        Abrir Dialog
      </button>
    </div>

    <div class="form-row">
      <CrosierInputTextarea
        inputClass="notuppercase"
        label="Obs"
        id="obs"
        v-model="this.fields.obs"
        :error="this.errors.obs"
      />
    </div>
  </div>
</template>

<script>
import Toast from "primevue/toast";
import ConfirmDialog from "primevue/confirmdialog";
import * as yup from "yup";
import {
  CrosierInputInt,
  CrosierInputText,
  CrosierInputTextarea,
  CrosierCurrency,
  submitForm,
  SetFocus,
} from "crosier-vue";
import { mapGetters, mapMutations } from "vuex";
import TheDialog from "./dialog.vue";

export default {
  components: {
    Toast,
    CrosierInputText,
    CrosierInputTextarea,
    CrosierInputInt,
    CrosierCurrency,
    TheDialog,
    ConfirmDialog,
  },

  data() {
    return {
      schemaValidator: {},
      valorCredito2: null,
    };
  },

  async mounted() {
    this.setLoading(true);

    this.schemaValidator = yup.object().shape({
      codigo: yup.number().required().typeError(),
      descricao: yup.string().required().typeError(),
      concreto: yup.boolean().required().typeError(),
    });

    SetFocus("UUID", 60);

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
