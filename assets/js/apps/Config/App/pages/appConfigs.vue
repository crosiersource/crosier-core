<template>
  <ConfirmPopup></ConfirmPopup>
  <div class="card mt-2">
    <div class="card-body">
      <h5 class="card-title h5">Configurações</h5>

      <table class="table table-striped table-hover display compact">
        <thead>
          <tr>
            <th scope="col">Chave</th>
            <th scope="col">Valor</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="r in this.tableData">
            <td>{{ r.chave }}</td>
            <td>
              <vue-json-editor
                readonly="readonly"
                style="width: 600px; height: 400px"
                v-if="r.isJson || r.chave.includes('json')"
                :value="r.valor"
                :expandedOnStart="true"
              />

              <InputText
                readonly="readonly"
                v-if="!r.isJson"
                class="form-control notuppercase"
                id="valor"
                type="text"
                v-model="r.valor"
              />
            </td>
            <td class="text-right">
              <div class="row d-flex justify-content-end">
                <Button
                  icon="pi pi-pencil"
                  class="mr-2 p-button-rounded p-button-sm p-button-info dt-sm-bt"
                  v-tooltip="'Editar'"
                  @click="this.editarAppConfig(r.id)"
                />
                <Button
                  icon="pi pi-trash"
                  class="mr-2 p-button-rounded p-button-sm p-button-danger dt-sm-bt"
                  v-tooltip="'Deletar'"
                  @click="deletarAppConfig($event, r.id)"
                />
              </div>
              <div class="row mt-1 d-flex justify-content-end">
                <span class="badge badge-info">
                  {{ new Date(r.updated).toLocaleString() }}
                </span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <appConfigForm />
</template>

<script>
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import { fetchTableData } from "@/services/ApiDataFetchService";
import axios from "axios";
import ConfirmPopup from "primevue/confirmpopup";
import vueJsonEditor from "vue-json-editor";
import appConfigForm from "./appConfigForm";

export default {
  name: "appConfigs",
  components: { InputText, vueJsonEditor, Button, ConfirmPopup, appConfigForm },
  data() {
    return {
      baseApi: "/api/core/config/appConfig",
      loading: false,
      tableData: null,
      totalRecords: 0,
      appConfigsFormDatas: {},
    };
  },
  async mounted() {
    this.loading = true;

    const params = {
      headers: {
        "Content-Type": "application/json;charset=UTF-8",
      },
    };

    const response = await axios.get(
      `${this.baseApi}?appUUID=${this.$root.formApp.UUID}`,
      params
    );

    this.totalRecords = response.data["hydra:totalItems"];
    this.tableData = response.data["hydra:member"];
    this.loading = false;
  },
  methods: {
    fetchTableData,

    async editarAppConfig(id) {
      const response = await fetchTableData({
        apiResource: `/api/core/config/appConfig/${id}`,
      });
      if (response.data) {
        this.$root.formAppConfig = response.data;
        this.$root.displayFormAppConfigModal = true;
      } else {
        this.$toast.add({
          severity: "error",
          summary: "Mensagem de erro",
          detail: "Errooooooo",
          life: 3000,
        });
      }
    },
    deletarAppConfig(event, id) {
      this.$confirm.require({
        target: event.currentTarget,
        message: `Are you sure you want to proceed o ${id}?`,
        icon: "pi pi-exclamation-triangle",
        accept: () => {
          // callback to execute when user confirms the action
        },
        reject: () => {
          // callback to execute when user rejects the action
        },
      });
    },
  },
};
</script>
