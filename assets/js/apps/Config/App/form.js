import { createApp } from "vue";
import PrimeVue from "primevue/config";
import ToastService from "primevue/toastservice";
import { createStore } from "vuex";
import { api } from "crosier-vue";
import primevueOptions from "crosier-vue/src/primevue.config.js";
import ConfirmationService from "primevue/confirmationservice";
import axios from "axios";
import Page from "./pages/form";
import "primeflex/primeflex.css";
import "primevue/resources/themes/bootstrap4-light-blue/theme.css"; // theme
import "primevue/resources/primevue.min.css"; // core css
import "primeicons/primeicons.css";

import "crosier-vue/src/yup.locale.pt-br.js";

const app = createApp(Page);

app.use(PrimeVue, primevueOptions);
app.use(ConfirmationService);
app.use(ToastService);

// Create a new store instance.
const store = createStore({
  state() {
    return {
      loading: 0,
      fields: {},
      fieldsErrors: {},
      fieldsAppConfig: {},
      fieldsAppConfigErrors: {},
      appConfigs: {},
    };
  },
  getters: {
    isLoading: (state) => state.loading > 0,

    getFields: (state) => state.fields,
    getFieldsErrors: (state) => state.fieldsErrors,
    getFieldsAppConfig: (state) => state.fieldsAppConfig,
    getFieldsAppConfigErrors: (state) => state.fieldsAppConfigErrors,
    getAppConfigs: (state) => state.appConfigs,
  },
  mutations: {
    setLoading(state, loading) {
      if (loading) {
        state.loading++;
      } else {
        state.loading--;
      }
    },

    setFields(state, fields) {
      state.fields = fields;
    },

    setFieldsErrors(state, formErrors) {
      state.fieldsErrors = formErrors;
    },

    setFieldsAppConfig(state, fieldsAppConfig) {
      state.fieldsAppConfig = fieldsAppConfig;
    },

    setFieldsAppConfigErrors(state, fieldsAppConfigErrors) {
      state.fieldsAppConfigErrors = fieldsAppConfigErrors;
    },

    setAppConfigs(state, appConfigs) {
      state.appConfigs = appConfigs;
    },
  },

  actions: {
    async loadData(context) {
      context.commit("setLoading", true);
      const id = new URLSearchParams(window.location.search.substring(1)).get("id");
      if (id) {
        try {
          const response = await api.get({
            apiResource: `/api/cfg/app/${id}`,
          });

          if (response.data["@id"]) {
            context.commit("setFields", response.data);
            context.dispatch("loadAppConfigs");
          } else {
            console.error("Id não encontrado");
          }
        } catch (err) {
          console.error(err);
        }
      }
      context.commit("setLoading", false);
    },

    async loadAppConfigs(context) {
      const response = await axios.get(`/api/cfg/appConfig?appUUID=${context.state.fields.UUID}`, {
        headers: {
          "Content-Type": "application/json;charset=UTF-8",
        },
      });
      console.log(response);
      const rs = response.data["hydra:member"].map((e) => {
        if (e.isJson) {
          e.valor = JSON.parse(e.valor);
        }
        return e;
      });

      context.commit("setAppConfigs", rs);
    },
  },
});

app.use(store);

app.mount("#app");
