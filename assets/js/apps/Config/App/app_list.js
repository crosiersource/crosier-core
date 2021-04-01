import { createApp } from "vue";
import PrimeVue from "primevue/config";
import ToastService from "primevue/toastservice";
import Tooltip from "primevue/tooltip";
import ConfirmationService from "primevue/confirmationservice";
import { createStore } from "vuex";
import Page from "./pages/list";
import "primeflex/primeflex.css";
import "primevue/resources/themes/saga-blue/theme.css"; // theme
import "primevue/resources/primevue.min.css"; // core css
import "primeicons/primeicons.css";

const app = createApp(Page);

app.use(PrimeVue);

app.use(ToastService);

// Create a new store instance.
const store = createStore({
  state() {
    return {
      filterFields: {
        id: null,
        descricao: null,
        ativo: null,
      },
    };
  },
  mutations: {
    setFilterFields(state, newFilterFields) {
      state.filterFields = newFilterFields;
    },
  },
});

app.use(store);
app.use(ConfirmationService);

app.directive("tooltip", Tooltip);

app.mount("#app");
