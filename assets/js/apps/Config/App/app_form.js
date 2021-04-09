import { createApp } from "vue";
import PrimeVue from "primevue/config";
import Tooltip from "primevue/tooltip";
import ToastService from "primevue/toastservice";
import ConfirmationService from "primevue/confirmationservice";
import { createStore } from "vuex";
import Page from "./pages/form";
import "primeflex/primeflex.css";
import "primevue/resources/themes/bootstrap4-light-blue/theme.css"; // theme
import "primevue/resources/primevue.min.css"; // core css
import "primeicons/primeicons.css";
import "@/primevue.config.js";
import "@/yup.locale.pt-br.js";

const app = createApp(Page);

const store = createStore({
  state() {
    return {
      displayFormAppConfigModal: false,
      formFieldsApp: {
        nome: "",
        UUID: null,
      },
      formFieldsAppErrors: {},
      formFieldsAppConfig: {
        chave: null,
        valor: null,
        isJson: false,
        appUUID: null,
      },
      formFieldsAppConfigErrors: {},
    };
  },
  getters: {
    // eslint-disable-next-line no-unused-vars
    formFieldsApp(state, getters) {
      const { formFieldsApp } = state;
      return formFieldsApp;
    },
    // eslint-disable-next-line no-unused-vars
    formFieldsAppConfig(state, getters) {
      const { formFieldsAppConfig } = state;
      return formFieldsAppConfig;
    },
  },
  mutations: {
    setFormFieldsApp(state, values) {
      state.formFieldsApp = values;
    },
    setFormFieldsAppErrors(state, values) {
      state.formFieldsAppErrors = values;
    },
    setFormFieldsAppConfig(state, values) {
      state.formFieldsAppConfig = values;
    },
    setFormFieldsAppConfigErrors(state, values) {
      state.formFieldsAppConfig = values;
    },
  },
});

app.use(store);

app.use(PrimeVue);
app.use(ToastService);
app.use(ConfirmationService);
app.directive("tooltip", Tooltip);

app.mount("#app");
