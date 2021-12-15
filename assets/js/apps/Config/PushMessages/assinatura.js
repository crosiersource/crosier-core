import { createApp } from "vue";
import PrimeVue from "primevue/config";
import ToastService from "primevue/toastservice";
import Tooltip from "primevue/tooltip";
import ConfirmationService from "primevue/confirmationservice";
import { createStore } from "vuex";
import primevueOptions from "crosier-vue/src/primevue.config.js";
import { api } from "crosier-vue";
import Page from "./pages/assinatura";
import "primeflex/primeflex.css";
import "primevue/resources/themes/saga-blue/theme.css"; // theme
import "primevue/resources/primevue.min.css"; // core css
import "primeicons/primeicons.css";

const app = createApp(Page);

app.use(PrimeVue, primevueOptions);

app.use(ToastService);

// Create a new store instance.
const store = createStore({
  state() {
    return {
      loading: 0,
      listasPush: [],
      auxs: {
        assinaturas: [],
      },
    };
  },

  getters: {
    isLoading: (state) => state.loading > 0,

    getListasPush: (state) => state.listasPush,

    getAuxs: (state) => state.auxs,
  },

  mutations: {
    setLoading(state, loading) {
      if (loading) {
        state.loading++;
      } else {
        state.loading--;
      }
    },
  },

  actions: {
    async loadListasPush(context) {
      const rs = await api.get({
        apiResource: "/api/core/config/pushMessage/getListasPush",
      });
      context.state.listasPush = rs.data.DATA;

      context.state.auxs.assinaturas = context.state.listasPush
        .filter((e) => e.assinada)
        .map((e) => e.chave);
    },
  },
});

app.use(store);
app.use(ConfirmationService);

app.directive("tooltip", Tooltip);

app.mount("#app");
