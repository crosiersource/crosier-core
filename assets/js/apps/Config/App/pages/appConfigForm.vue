<template>
  <Dialog
    :header="'Configuração de App'"
    v-model:visible="this.$store.state.displayFormAppConfigModal"
    :style="{ width: '55vw', height: '60vh' }"
    :modal="true"
    ref="dialog"
  >
    <CrosierForm
      :withoutCard="true"
      :withoutSaveButton="true"
      :apiResource="'/api/core/config/appConfig'"
      @handleSubmitForm="this.handleSubmitFormPaciente()"
      @closeModal="handleCloseForm"
      ref="formAppConfig"
      storeName="formAppConfig"
      setStoreName="setFormAppConfig"
      setStoreErrorsName="setFormAppConfigErrors"
      :notLoadOnMount="true"
    >
      <div class="row">
        <div class="col-sm-8 col-12">
          <label v-bind:for="name">Chave</label>
          <InputText
            class="form-control notuppercase"
            id="id"
            type="text"
            v-model="this.$store.getters.getFormAppConfig.chave"
          />
          <div class="invalid-feedback">
            {{ this.$store.getters.getFormAppConfigErrors.chave }}
          </div>
        </div>

        <div class="col-sm-4 col-12">
          <Checkbox
            name="isJson"
            :binary="true"
            :value="true"
            v-model="this.$store.getters.getFormAppConfig.isJson"
          />
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <label v-bind:for="name">Valor</label>

          <vue-json-editor
            v-if="this.isJson"
            :value="this.$store.getters.getFormAppConfig.valor"
            v-model="this.$store.getters.getFormAppConfig.valor"
            :expandedOnStart="true"
            @json-change="
              (value) => {
                this.$store.getters.getFormAppConfig.valor = value;
              }
            "
          ></vue-json-editor>

          <InputText
            v-if="!this.isJson"
            class="form-control notuppercase"
            id="valor"
            type="text"
            v-model="this.$store.getters.getFormAppConfig.valor"
          />
        </div>
      </div>

      <div class="row mt-3">
        <div class="col text-right">
          <Button
            style="width: 12rem"
            label="Salvar"
            type="submit"
            icon="fas fa-save"
            v-if="!this.disabledSubmit"
          />
        </div>
      </div>
    </CrosierForm>
  </Dialog>

  <pre>{{ this.stored_formFields }}</pre>
</template>

<script>
import Button from "primevue/button";
import Dialog from "primevue/dialog";
import InputText from "primevue/inputtext";
import Checkbox from "primevue/checkbox";
import CrosierForm from "@/components/crosierForm";
import vueJsonEditor from "vue-json-editor";

export default {
  name: "appConfigForm",
  components: {
    Button,
    Dialog,
    CrosierForm,
    InputText,
    Checkbox,
    vueJsonEditor,
  },
  data() {},
  computed: {
    isJson() {
      console.log(
        `typeof: ${typeof this.$store.getters.getFormAppConfig.isJson}`
      );
      console.log(this.$store.getters.getFormAppConfig.isJson);
      console.log(
        this.$store.getters.getFormAppConfig.isJson ||
          this.$store.getters.getFormAppConfig.chave.includes("json")
      );
      if (typeof this.$store.getters.getFormAppConfig.isJson !== "boolean") {
        return false;
      }
      return (
        this.$store.getters.getFormAppConfig.isJson ||
        this.$store.getters.getFormAppConfig.chave.includes("json")
      );
    },
  },
  methods: {
    async handleOpenForm() {
      this.displayModal = true;
    },
    handleCloseForm() {
      this.displayModal = false;
    },
    async handleSubmitForm() {
      await this.$refs.form.submitForm();
    },
    async handleSubmitFormPaciente() {
      await this.$refs.formPaciente.submitForm();
    },
  },
};
</script>
