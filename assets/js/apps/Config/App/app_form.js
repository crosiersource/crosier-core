import { createApp } from "vue";
import PrimeVue from "primevue/config";
import ToastService from "primevue/toastservice";
import { createStore } from "vuex";
import { fetchTableData } from "@/services/ApiDataFetchService";
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
      formFields: {
        id: null,
        descricao: null,
        ativo: null,
        jsonData: null,
      },
      formErrors: [],
    };
  },
  mutations: {
    setFormFields(state, newFormFields) {
      state.formFields = newFormFields;
    },
    setFormErrors(state, newFormErrors) {
      state.formErrors = newFormErrors;
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

app.mount("#app");
