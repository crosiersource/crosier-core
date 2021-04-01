import { createApp } from "vue";
import PrimeVue from "primevue/config";
import Tooltip from "primevue/tooltip";
import ToastService from "primevue/toastservice";
import { createStore } from "vuex";
import { fetchTableData } from "@/services/ApiDataFetchService";
import ConfirmationService from "primevue/confirmationservice";
import Page from "./pages/form";
import "primeflex/primeflex.css";
import "primevue/resources/themes/bootstrap4-light-blue/theme.css"; // theme
import "primevue/resources/primevue.min.css"; // core css
import "primeicons/primeicons.css";

const app = createApp(Page);
app.use(PrimeVue);

app.use(ToastService);

// Create a new store instance.
const store = createStore({
  state() {
    return {
      formApp: {},
      formAppErrors: {},
      formAppConfig: {},
      formAppConfigErrors: {},
      displayFormAppConfigModal: false,
    };
  },
  getters: {
    getFormApp(state) {
      return state.formApp;
    },
    getFormAppErrors(state) {
      return state.formAppErrors;
    },
    getFormAppConfig(state) {
      return state.formAppConfig;
    },
    getFormAppConfigErrors(state) {
      return state.formAppConfigErrors;
    },
  },
  mutations: {
    set(state, data) {
      state[data.attr] = data.vals;
    },
    async loadData(state, { id, apiResource, storeName = "" }) {
      if (id) {
        try {
          const response = await fetchTableData({
            apiResource: `${apiResource}/${id}}`,
          });

          if (response.data["@id"]) {
            state[storeName] = response.data;
          } else {
            throw new Error("Id não encontrado.");
          }
        } catch (err) {
          console.log(err);
        }
      }
    },
  },
});

app.use(store);
app.use(ConfirmationService);
app.directive("tooltip", Tooltip);

app.mount("#app");
