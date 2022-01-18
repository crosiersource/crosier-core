<template>
  <Dialog
    :header="'Configuração de App'"
    v-model:visible="this.$store.state.displayFormAppConfigModal"
    :style="{ width: '55vw' }"
    :modal="true"
    ref="dialog"
  >
    <CrosierFormS
      :notSetUrlId="true"
      :withoutCard="true"
      ref="formAppConfig"
      :notLoadOnMount="true"
      @submitForm="this.submitForm"
    >
      <div class="row">
        <div class="col-sm-8 col-12">
          <div class="form-group">
            <label v-bind:for="name">Chave</label>
            <InputText
              class="form-control notuppercase"
              id="chave"
              type="text"
              v-model="this.fieldsAppConfig.chave"
            />
          </div>
        </div>

        <div class="col-sm-4 col-12">
          <div class="form-group">
            <SelectButton
              @change="this.changeIsJson"
              v-model="this.fieldsAppConfig.isJson"
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
              style="min-height: 300px"
              id="valor"
              v-show="this.isJson"
              :value="this.fieldsAppConfig.valor"
              v-model="this.fieldsAppConfig.valor"
              :expandedOnStart="true"
              @json-change="
                (value) => {
                  this.fieldsAppConfig.valor = value;
                }
              "
            />

            <InputText
              v-show="!this.isJson"
              class="form-control notuppercase"
              id="valor"
              type="text"
              v-model="this.fieldsAppConfig.valor"
            />
          </div>
        </div>
      </div>
    </CrosierFormS>
  </Dialog>
</template>

<script>
import Dialog from "primevue/dialog";
import InputText from "primevue/inputtext";
import SelectButton from "primevue/selectbutton";
import vueJsonEditor from "vue-json-editor";
import * as yup from "yup";
import { CrosierFormS, submitForm } from "crosier-vue";
import { mapGetters, mapMutations } from "vuex";

export default {
  name: "appConfigForm",
  components: {
    Dialog,
    CrosierFormS,
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

  methods: {
    ...mapMutations(["setLoading", "setFieldsAppConfig", "setFieldsAppConfigErrors"]),

    async submitForm() {
      this.setLoading(true);
      const rs = await submitForm({
        apiResource: "/api/cfg/appConfig",
        schemaValidator: this.schemaValidator,
        $store: this.$store,
        formDataStateName: "fieldsAppConfig",
        $toast: this.$toast,
        setUrlId: false,
        fnBeforeSave: (formData) => {
          formData.valor = formData.isJson ? JSON.stringify(formData.valor) : formData.valor;
        },
      });
      if (rs?.status === 200 || rs?.status === 201) {
        this.$store.state.displayFormAppConfigModal = false;
        this.$store.dispatch("loadAppConfigs");
      }
      this.setLoading(false);
    },

    changeIsJson() {
      this.$nextTick(() => {
        this.fieldsAppConfig.valor = this.fieldsAppConfig.isJson
          ? JSON.parse(this.fieldsAppConfig.valor)
          : JSON.stringify(this.fieldsAppConfig.valor);
      });
    },
  },

  computed: {
    ...mapGetters({ fieldsAppConfig: "getFieldsAppConfig" }),

    isJson() {
      if (typeof this.fieldsAppConfig.isJson !== "boolean") {
        return false;
      }

      return this.fieldsAppConfig.isJson || this.fieldsAppConfig.chave?.includes("json");
    },
  },
};
</script>
<style>
div.jsoneditor-tree {
  min-height: 300px;
}
</style>
