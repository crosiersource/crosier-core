<template>
  <Toast position="bottom-right" class="mt-5" />
  <CrosierFormS listUrl="/v/sec/user/list" @submitForm="this.submitForm" titulo="Usuário">
    <div class="form-row">
      <CrosierInputInt label="Id" col="2" id="id" v-model="this.fields.id" :disabled="true" />

      <CrosierInputText
        label="Usuário"
        col="4"
        id="nome"
        inputClass="lowercase"
        v-model="this.fields.username"
        :error="this.formErrors.username"
      />

      <CrosierInputText
        label="Nome"
        col="6"
        id="nome"
        v-model="this.fields.nome"
        :error="this.formErrors.nome"
      />
    </div>

    <div class="form-row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="password">Senha</label>
          <div class="input-group">
            <Password
              :class="'form-control ' + (this.error ? 'is-invalid' : '')"
              id="password"
              v-model="this.fields.password"
              weakLabel="Fraco"
              mediumLabel="Médio"
              strongLabel="Forte"
              :toggleMask="true"
            />
          </div>
          <div class="invalid-feedbackk blink" v-show="this.formErrors.password">
            {{ this.formErrors.password }}
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="password2">Repita a Senha</label>
          <div class="input-group">
            <Password
              :class="'form-control ' + (this.error ? 'is-invalid' : '')"
              id="password2"
              v-model="this.fields.password2"
              weakLabel="Fraco"
              mediumLabel="Médio"
              strongLabel="Forte"
              :toggleMask="true"
            />
          </div>
          <div class="invalid-feedbackk blink" v-show="this.formErrors.password2">
            {{ this.formErrors.password2 }}
          </div>
        </div>
      </div>
    </div>

    <div class="form-row">
      <CrosierInputEmail col="4" label="E-mail" id="email" v-model="this.fields.email" />
      <CrosierInputTelefone col="3" label="Fone" id="fone" v-model="this.fields.fone" />

      <CrosierSwitch label="Ativo" col="1" id="isActive" v-model="this.fields.isActive" />

      <CrosierDropdownEntity
        col="4"
        v-model="this.fields.group"
        entity-uri="/api/sec/group"
        optionLabel="groupname"
        :optionValue="null"
        :orderBy="{ groupname: 'ASC' }"
        label="Grupo"
        id="group"
        @change="this.onChangeGroup"
      />
    </div>

    <div class="row mt-3" v-if="!this.semBotaoSalvar">
      <div class="col text-right">
        <button
          class="btn btn-sm btn-primary"
          style="width: 12rem"
          type="submit"
          icon="fas fa-save"
          v-if="!this.disabledSubmit"
        >
          <i class="fas fa-save"></i> Salvar
        </button>
      </div>
    </div>

    <RolesList v-if="this.fields.id" />
  </CrosierFormS>
</template>

<script>
import Toast from "primevue/toast";
import * as yup from "yup";
import {
  CrosierFormS,
  CrosierInputInt,
  submitForm,
  CrosierInputText,
  CrosierInputEmail,
  CrosierDropdownEntity,
  CrosierInputTelefone,
  CrosierSwitch,
} from "crosier-vue";
import { mapGetters, mapMutations } from "vuex";
import Password from "primevue/password";
import RolesList from "./roles_list";

export default {
  components: {
    Toast,
    CrosierFormS,
    RolesList,
    CrosierInputText,
    CrosierInputInt,
    CrosierInputEmail,
    CrosierDropdownEntity,
    CrosierInputTelefone,
    CrosierSwitch,
    Password,
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
      username: yup.string().required().typeError(),
    });

    this.setLoading(false);
  },

  methods: {
    ...mapMutations(["setLoading", "setFields", "setFieldsErrors"]),

    async submitForm() {
      this.setLoading(true);
      await submitForm({
        apiResource: "/api/sec/user",
        schemaValidator: this.schemaValidator,
        $store: this.$store,
        formDataStateName: "fields",
        $toast: this.$toast,
        fnBeforeSave: (formData) => {
          formData.group = formData.group ? formData.group["@id"] : null;
          if (formData.userRoles) {
            formData.userRoles = formData.userRoles ? formData.userRoles.map((e) => e["@id"]) : [];
          }
        },
      });
      this.setLoading(false);
    },

    async onChangeGroup() {
      this.$nextTick(() => {
        this.fields.userRoles = this.fields.group.roles;
      });
    },
  },

  computed: {
    ...mapGetters({ fields: "getFields", formErrors: "getFieldsErrors" }),
  },
};
</script>
<style>
.p-password-input {
  text-transform: none !important;
  width: 100% !important;
}
</style>
