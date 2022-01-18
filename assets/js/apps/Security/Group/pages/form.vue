<template>
  <Toast position="bottom-right" class="mt-5" />
  <CrosierFormS listUrl="/v/sec/group/list" @submitForm="this.submitForm" titulo="Grupo de Usuário">
    <div class="form-row">
      <CrosierInputInt label="Id" col="3" id="id" v-model="this.fields.id" :disabled="true" />

      <CrosierInputText
        label="Grupo"
        col="9"
        id="nome"
        v-model="this.fields.groupname"
        :error="this.formErrors.groupname"
      />
    </div>

    <RolesList v-if="this.fields.id" />
  </CrosierFormS>
</template>

<script>
import Toast from "primevue/toast";
import * as yup from "yup";
import { CrosierFormS, CrosierInputInt, CrosierInputText, submitForm } from "crosier-vue";
import { mapGetters, mapMutations } from "vuex";
import RolesList from "./roles_list";

export default {
  components: {
    Toast,
    CrosierFormS,
    RolesList,
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
      groupname: yup.string().required().typeError(),
    });

    this.setLoading(false);
  },

  methods: {
    ...mapMutations(["setLoading", "setFields", "setFieldsErrors"]),

    async submitForm() {
      this.setLoading(true);
      await submitForm({
        apiResource: "/api/sec/group",
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
