<template>
  <Dialog
    :header="'Configuração de App'"
    v-model:visible="this.$store.state.displayFormAppConfigModal"
    :style="{ width: '55vw' }"
    :modal="true"
    ref="dialog"
  >
    <CrosierForm
      :notSetUrlId="true"
      :withoutCard="true"
      :apiResource="'/api/core/config/appConfig'"
      :schemaValidator="this.yupValidator"
      ref="formAppConfig"
      formFieldsName="formFieldsAppConfig"
      :notLoadOnMount="true"
    >
      <div class="row">
        <div class="col-sm-8 col-12">
          <div class="form-group">
            <label v-bind:for="name">Chave</label>
            <InputText
              class="form-control notuppercase"
              id="chave"
              type="text"
              v-model="this.formFieldsAppConfig.chave"
            />
            <div class="invalid-feedback">
              {{ this.formFieldsAppConfigErrors.chave }}
            </div>
          </div>
        </div>

        <div class="col-sm-4 col-12">
          <div class="form-group">
            <SelectButton
              v-model="this.formFieldsAppConfig.isJson"
              :options="[
                { label: 'JSON', value: true },
                { label: 'Texto', value: false },
              ]"
              optionLabel="label"
              optionValue="value"
            />
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label v-bind:for="valor">Valor</label>

            <vueJsonEditor
              id="valor"
              v-show="this.isJson"
              :value="this.formFieldsAppConfig.valor"
              v-model="this.formFieldsAppConfig.valor"
              :expandedOnStart="true"
              @json-change="
                (value) => {
                  this.formFieldsAppConfig.valor = value;
                }
              "
            />

            <InputText
              v-show="!this.isJson"
              class="form-control notuppercase"
              id="valor"
              type="text"
              v-model="this.formFieldsAppConfig.valor"
            />
          </div>
        </div>
      </div>
    </CrosierForm>
  </Dialog>
</template>

<script>
import Dialog from "primevue/dialog";
import InputText from "primevue/inputtext";
import CrosierForm from "@/components/crosierForm";
import SelectButton from "primevue/selectbutton";
import vueJsonEditor from "vue-json-editor";
import * as yup from "yup";

export default {
  name: "appConfigForm",
  components: {
    Dialog,
    CrosierForm,
    InputText,
    SelectButton,
    vueJsonEditor,
  },
  data() {
    return {
      yupValidator: {},
      isJsonValues: [
        { label: "JSON", value: true },
        { label: "Texto", value: false },
      ],
    };
  },
  mounted() {
    this.yupValidator = yup.object().shape({
      chave: yup.string().required().typeError(),
      valor: yup.string().required().typeError(),
    });
  },
  computed: {
    formFieldsAppConfig() {
      return this.$store.state.formFieldsAppConfig;
    },
    formFieldsAppConfigErrors() {
      return this.$store.state.formFieldsAppConfigErrors;
    },
    isJson() {
      if (typeof this.formFieldsAppConfig.isJson !== "boolean") {
        return false;
      }
      return this.formFieldsAppConfig.isJson || this.formFieldsAppConfig.chave?.includes("json");
    },
  },
};
</script>
