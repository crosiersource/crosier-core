import { createApp } from "vue";
import PrimeVue from "primevue/config";
import ToastService from "primevue/toastservice";
import { createStore } from "vuex";
import { api } from "crosier-vue";
import primevueOptions from "crosier-vue/src/primevue.config.js";
import ConfirmationService from "primevue/confirmationservice";
import Page from "./pages/alternarUser";
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
      users: null,
      aux: { user: null },
    };
  },
  getters: {
    isLoading: (state) => state.loading > 0,
    getUsers: (state) => state.users,
    getAux: (state) => state.aux,
  },
  mutations: {
    setLoading(state, loading) {
      if (loading) {
        state.loading++;
      } else {
        state.loading--;
      }
    },

    setUsers(state, users) {
      state.users = users;
    },

    setAux(state, aux) {
      state.aux = aux;
    },
  },

  actions: {
    async loadData(context) {
      context.commit("setLoading", true);

      try {
        const rsWhoami = await api.get({
          apiResource: "/api/whoami",
        });
        const me = rsWhoami.data;

        context.commit("setAux", { user: me.id });

        const response = await api.get({
          apiResource: `/api/sec/user/listUsersFromSameUserEmail`,
          complement: `&email=${me.email}`,
        });

        context.commit("setUsers", response.data.DATA);
      } catch (err) {
        console.error(err);
      }

      context.commit("setLoading", false);
    },
  },
});

app.use(store);

app.mount("#app");
