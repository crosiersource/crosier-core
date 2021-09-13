import { createApp } from "vue";
import PrimeVue from "primevue/config";
import ToastService from "primevue/toastservice";
import Tooltip from "primevue/tooltip";
import { createStore } from "vuex";
import primevueOptions from "@/primevue.config.js";
import Page from "./pages/list";
import "primeflex/primeflex.css";
import "primevue/resources/themes/bootstrap4-light-blue/theme.css"; // theme
import "primevue/resources/primevue.min.css"; // core css
import "primeicons/primeicons.css";

const app = createApp(Page);
app.use(PrimeVue, primevueOptions);
app.use(ToastService);

// Create a new store instance.
const store = createStore({
  state() {
    return {
      // fatd200
      syslog: {},
      list: {},
      loading: false,
      displayDialog: false,
    };
  },
});

app.use(store);
app.directive("tooltip", Tooltip);
app.mount("#app");
