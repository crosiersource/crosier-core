<template>
  <div class="container-fluid">
    <div class="card" style="margin-bottom: 50px">
      <div class="card-header">
        <div class="d-flex flex-wrap align-items-center">
          <div class="mr-1">
            <h3>{{ titulo }}</h3>
            <h6 v-if="subtitulo">{{ subtitulo }}</h6>
          </div>
          <div class="d-sm-flex flex-nowrap ml-auto">
            <a
              v-show="this.formUrl"
              type="button"
              class="btn btn-info"
              :href="this.formUrl"
              title="Novo"
            >
              <i class="fas fa-file" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <CrosierBlock :loading="this.loading" />
        <div>
          <Accordion
            :multiple="true"
            :activeIndex="this.isFiltered ? '[0]' : null"
          >
            <AccordionTab>
              <template #header>
                <span>Filtrar</span>
                <i class="pi pi-filter"></i>
              </template>
              <form @submit.prevent="this.doFilter()" class="notSubmit">
                <slot name="filter-fields"></slot>
                <div class="row mt-3">
                  <div class="col-3">
                    <InlineMessage severity="info">
                      {{ totalRecords }} registro(s).
                    </InlineMessage>
                  </div>
                  <div class="col text-right">
                    <Button
                      label="Filtrar"
                      type="submit"
                      icon="fas fa-search"
                      class="p-button-primary p-button-sm mr-2"
                    />
                    <Button
                      label="Limpar"
                      icon="fas fa-backspace"
                      class="p-button-secondary p-button-sm mr-2"
                      @click="this.clearFilter()"
                    />
                  </div>
                </div>
              </form>
            </AccordionTab>
          </Accordion>
        </div>
        <data-table
          stateStorage="local"
          :stateKey="'dt-state' + this.apiResource"
          class="p-datatable-sm p-datatable-striped"
          :value="tableData"
          :totalRecords="totalRecords"
          :lazy="true"
          :paginator="true"
          :rows="10"
          @page="onPage($event)"
          @sort="onSort($event)"
          removableSort
          sortField="id"
          :sortOrder="1"
          ref="dt"
          paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink
           LastPageLink CurrentPageReport RowsPerPageDropdown"
          :rowsPerPageOptions="[5, 10, 25, 50, 1000]"
          currentPageReportTemplate="{first} - {last} de {totalRecords}"
          v-model:selection="this.selectedItems"
          dataKey="id"
          @row-select="onSelectChange"
          @row-unselect="onSelectChange"
        >
          <template #footer>
            <div style="text-align: right">
              <Button
                class="p-button-rounded p-button-success p-button-text"
                icon="pi pi-file-excel"
                label="Exportar"
                @click="exportCSV($event)"
              />
            </div>
          </template>
          <slot name="columns"></slot>
        </data-table>
      </div>
    </div>
  </div>
  <ConfirmDialog></ConfirmDialog>
  <Toast class="mt-5" />
</template>

<script>
import DataTable from "primevue/datatable";
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";
import ConfirmDialog from "primevue/confirmdialog";
import Button from "primevue/button";
import InlineMessage from "primevue/inlinemessage";
import Toast from "primevue/toast";
import { fetchTableData } from "@/services/ApiDataFetchService";
import { deleteEntityData } from "@/services/ApiDeleteService";
import listSelectStore from "../store/listSelectStore";
import CrosierBlock from "./crosierBlock";

export default {
  name: "CrosierList",
  components: {
    Accordion,
    AccordionTab,
    Button,
    ConfirmDialog,
    DataTable,
    InlineMessage,
    CrosierBlock,
    Toast,
  },

  props: {
    titulo: {
      type: String,
      required: true,
    },
    subtitulo: {
      type: String,
      required: false,
    },
    formUrl: {
      type: String,
      required: false,
    },
    parentLoad: {
      type: Boolean,
      required: true,
      default: false,
    },
    filters: {
      type: Object,
      required: true,
    },
    apiResource: {
      type: String,
      required: true,
    },
  },

  data() {
    return {
      savedFilter: {},
      isFiltered: false,
      totalRecords: 0,
      tableData: null,
      selectedItems: [],
    };
  },

  async mounted() {
    this.$store.state.loading = true;

    const uri = window.location.search.substring(1);
    const params = new URLSearchParams(uri);

    this.savedFilter =
      params.get("saved_filter") ||
      localStorage.getItem(`filter-state${this.apiResource}`);
    if (this.savedFilter) {
      this.$emit("loadSavedFilters", JSON.parse(this.savedFilter));
    }

    const dtStateLS = JSON.parse(
      localStorage.getItem(`dt-state${this.apiResource}`)
    );

    const page = dtStateLS
      ? Math.ceil((dtStateLS.first + 1) / dtStateLS.rows)
      : 1;

    const rows = dtStateLS ? dtStateLS.rows : 10;

    const sorterOrder = {
      1: "ASC",
      "-1": "DESC",
    };

    const order = new Map();
    if (dtStateLS && sorterOrder[dtStateLS.sortOrder]) {
      order.set(dtStateLS.sortField, sorterOrder[dtStateLS.sortOrder]);
    }

    const response = await this.fetchTableData({
      apiResource: this.apiResource,
      page,
      rows,
      order,
      filters: this.filters,
    });

    this.totalRecords = response.data["hydra:totalItems"];
    this.tableData = response.data["hydra:member"];

    // eslint-disable-next-line no-restricted-syntax
    for (const key in this.fields) {
      if (this.filters[key] !== null && this.filters[key] !== "")
        this.isFiltered = true;
    }

    this.$store.state.loading = false;
  },

  methods: {
    fetchTableData,
    deleteEntityData,

    async lazyFetch(event) {
      this.$store.state.loading = true;
      const page = event ? Math.ceil((event.first + 1) / event.rows) : 1;
      const rows = event ? event.rows : 10;
      const filters = this.filters;
      const sorterOrder = {
        1: "ASC",
        "-1": "DESC",
      };
      const order = new Map();
      if (sorterOrder[event.sortOrder]) {
        order.set(event.sortField, sorterOrder[event.sortOrder]);
      }
      const response = await this.fetchTableData({
        apiResource: this.apiResource,
        page,
        rows,
        order,
        filters,
      });
      this.totalRecords = response.data["hydra:totalItems"];
      this.tableData = response.data["hydra:member"];
      this.$store.state.loading = false;
    },

    redirectForm(id = "") {
      window.location.href = `form${id ? `?id=${id}` : ""}`;
    },

    async onPage(event) {
      await this.lazyFetch(event);
    },

    async onSort(event) {
      await this.lazyFetch(event);
    },

    async doFilter() {
      console.log("sim");
      this.$store.state.loading = true;

      // get from api
      const response = await this.fetchTableData({
        apiResource: this.apiResource,
        filters: this.filters,
      });

      this.totalRecords = response.data["hydra:totalItems"];
      this.tableData = response.data["hydra:member"];

      // save filters on localstorage
      localStorage.setItem(
        `filter-state${this.apiResource}`,
        JSON.stringify(this.filters)
      );

      this.$store.state.loading = false;
    },

    async delete(event, id) {
      this.$confirm.require({
        target: event.currentTarget,
        message: "Tem certeza que deseja deletar?",
        icon: "pi pi-exclamation-triangle",
        acceptLabel: "Sim",
        rejectLabel: "Não",
        accept: async () => {
          try {
            this.$store.state.loading = true;

            const response = await this.deleteEntityData({
              apiResource: `${this.apiResource}${id}`,
            });
            if (response.status === 204) {
              this.$toast.add({
                severity: "success",
                summary: "Sucesso",
                detail: "Registro deletado com sucesso!",
                life: 3000,
              });

              document.location.reload(true);
            } else {
              throw new Error("erro");
            }
          } catch (err) {
            this.$toast.add({
              severity: "error",
              summary: "Mensagem de erro",
              detail: "Ocorreu um erro ao deletar",
              life: 3000,
            });
            console.log(err);
          }
          this.$store.state.loading = false;
        },
      });
    },

    exportCSV() {
      this.$refs.dt.exportCSV();
    },

    // eslint-disable-next-line no-unused-vars
    onSelectChange(e) {
      listSelectStore.dispatch("updateSelectedRows", this.selectedItems);
    },
  },
  computed: {
    loading() {
      return this.$store.state.loading || this.parentLoad;
    },
    stored_selectedItems() {
      return listSelectStore.state.selectedItems.length;
    },
  },
};
</script>
