<template>
  <Toast position="bottom-right" class="mt-5" />
  <CrosierFormS listUrl="/v/sec/role/list" @submitForm="this.submitForm" titulo="Permissão">
    <div class="form-row">
      <CrosierInputInt label="Id" col="2" id="id" v-model="this.fields.id" :disabled="true" />

      <CrosierInputText
        label="Permissão"
        col="4"
        id="nome"
        v-model="this.fields.role"
        :error="this.formErrors.role"
      />

      <CrosierInputText
        label="Descrição"
        col="6"
        id="nome"
        v-model="this.fields.descricao"
        :error="this.formErrors.descricao"
      />
    </div>
  </CrosierFormS>
</template>

<script>
import Toast from "primevue/toast";
import * as yup from "yup";
import { CrosierFormS, CrosierInputInt, CrosierInputText, submitForm } from "crosier-vue";
import { mapGetters, mapMutations } from "vuex";

export default {
  components: {
    Toast,
    CrosierFormS,
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
      role: yup.string().required().typeError(),
      descricao: yup.string().required().typeError(),
    });

    this.setLoading(false);
  },

  methods: {
    ...mapMutations(["setLoading", "setFields", "setFieldsErrors"]),

    async submitForm() {
      this.setLoading(true);
      await submitForm({
        apiResource: "/api/sec/role",
        schemaValidator: this.schemaValidator,
        $store: this.$store,
        formDataStateName: "fields",
        $toast: this.$toast,
        fnBeforeSave: (formData) => {
          formData.roles = formData.roles ? formData.roles.map((e) => e["@id"]) : [];
        },
      });
      this.setLoading(false);
    },
  },

  computed: {
    ...mapGetters({ fields: "getFields", formErrors: "getFieldsErrors" }),
  },
};
</script>
