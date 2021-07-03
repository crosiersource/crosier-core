import { createApp } from "vue";
import ConfirmationService from "primevue/confirmationservice";
import primevueOptions from "@/primevue.config.js";
import PrimeVue from "primevue/config";
import { fetchTableData } from "@/services/ApiDataFetchService";
import ToastService from "primevue/toastservice";
import Tooltip from "primevue/tooltip";
import { createStore } from "vuex";
import Page from "./pages/tabview";
import "primeflex/primeflex.css";
import "primevue/resources/themes/bootstrap4-light-blue/theme.css"; // theme
import "primevue/resources/primevue.min.css"; // core css
import "primeicons/primeicons.css";

const app = createApp(Page);
app.use(PrimeVue, primevueOptions);
app.use(ToastService);
app.use(ConfirmationService);

// Create a new store instance.
const store = createStore({
  state() {
    return {
      // fatd200
      pv: {},
      pvErrors: {},
      // produto
      pvItensList: {},
      pvItem: {},
      pvItemErrors: {},
      // servico
      pvItensServicoList: {},
      pvItemServico: {},
      pvItemServicoErrors: {},
      // fechamento
      fechamento: {
        "@id": null,
      },
      fechamentoErrors: {},
      // resVenda
      resVenda: {
        "@id": null,
      },
      resVendaErrors: {},
      loading: false,
    };
  },
  actions: {
    async loadPv(context) {
      const id = new URLSearchParams(window.location.search.substring(1)).get("id");
      if (id) {
        try {
          const response = await fetchTableData({
            apiResource: `/api/ekt/fat-d200/${id}}`,
          });
          console.log(response.data);
          response.data.emissao = response.data.emissao ? new Date(response.data.emissao) : null;
          response.data.vencto01 = response.data.vencto01 ? new Date(response.data.vencto01) : null;
          response.data.vencto02 = response.data.vencto02 ? new Date(response.data.vencto02) : null;
          response.data.vencto03 = response.data.vencto03 ? new Date(response.data.vencto03) : null;
          response.data.vencto04 = response.data.vencto04 ? new Date(response.data.vencto04) : null;
          response.data.vencto05 = response.data.vencto05 ? new Date(response.data.vencto05) : null;
          response.data.vencto06 = response.data.vencto06 ? new Date(response.data.vencto06) : null;
          response.data.vencto07 = response.data.vencto07 ? new Date(response.data.vencto07) : null;
          response.data.vencto08 = response.data.vencto08 ? new Date(response.data.vencto08) : null;
          response.data.vencto09 = response.data.vencto09 ? new Date(response.data.vencto09) : null;
          response.data.vencto10 = response.data.vencto10 ? new Date(response.data.vencto10) : null;
          response.data.vencto11 = response.data.vencto11 ? new Date(response.data.vencto11) : null;
          response.data.vencto12 = response.data.vencto12 ? new Date(response.data.vencto12) : null;
          if (response.data["@id"]) {
            context.state.pv = response.data;
            context.dispatch("atualizaPvItensList");
          } else {
            throw new Error("Id não encontrado.");
          }
        } catch (err) {
          console.log(err);
        }
      }
    },
    async atualizaPvItensList(context) {
      context.state.loading = true;
      console.log("action atualizaPvItensList");
      console.log(context);

      const rItens = await fetchTableData({
        apiResource: "/api/ekt/fat-d201",
        filters: { numNf: context.state.pv.numeroNf },
      });
      console.log("rItens");
      console.log(rItens);
      if (rItens.data) {
        context.state.pvItensList = rItens.data["hydra:member"];
      }
      context.state.loading = false;
    },
  },
});

app.use(store);
app.directive("tooltip", Tooltip);
app.mount("#app");
