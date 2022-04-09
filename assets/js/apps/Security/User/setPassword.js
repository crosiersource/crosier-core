import { createApp } from "vue";
import PrimeVue from "primevue/config";
import ToastService from "primevue/toastservice";
import { createStore } from "vuex";
import primevueOptions from "crosier-vue/src/primevue.config.js";
import Page from "./pages/setPassword";
import "primeflex/primeflex.css";
import "primevue/resources/themes/bootstrap4-light-blue/theme.css"; // theme
import "primevue/resources/primevue.min.css"; // core css
import "primeicons/primeicons.css";

import "crosier-vue/src/yup.locale.pt-br.js";

const app = createApp(Page);

app.use(PrimeVue, primevueOptions);

app.use(ToastService);

// Create a new store instance.
const store = createStore({
  state() {
    return {
      loading: 0,
      fields: {},
      fieldsErrors: [],
    };
  },

  getters: {
    isLoading(state) {
      return state.loading > 0;
    },

    getFields(state) {
      const { fields } = state;
      return fields;
    },

    getFieldsErrors(state) {
      const { fieldsErrors } = state;
      return fieldsErrors;
    },
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

    setFieldsErrors(state, fieldsErrors) {
      state.fieldsErrors = fieldsErrors;
    },
  },
});

app.use(store);

app.mount("#app");
