<template>
  <crosier-list
    :titulo="titulo"
    :apiResource="'/api/core/config/app/'"
    :columns="columns"
    formUrl="form"
    ref="list"
    @clearFilter="this.clearFilter"
    @handleFilter="this.handleFilter"
  >
    <template v-slot:columns>
      <column field="id" header="id" :sortable="true"></column>
      <column field="descricao" header="Descricao" :sortable="true"></column>
      <column field="ativo" header="Ativo" :sortable="true">
        <template #body="slotProps">
          <span
            v-if="slotProps.data.ativo === true"
            class="badge badge-success"
          >
            Sim
          </span>
          <span
            v-if="slotProps.data.ativo === false"
            class="badge badge-danger"
          >
            Não
          </span>
        </template>
      </column>
      <column field="updated" header="" :sortable="true">
        <template class="text-right" #body="slotProps">
          <div class="row d-flex justify-content-end">
            <button
              icon="pi pi-pencil"
              class="mr-2 p-button-rounded p-button-sm p-button-info dt-sm-bt"
              v-tooltip="'Editar'"
              @click="this.$refs.list.redirectForm(slotProps.data.id)"
            />
            <button
              icon="pi pi-trash"
              class="mr-2 p-button-rounded p-button-sm p-button-danger dt-sm-bt"
              v-tooltip="'Deletar'"
              @click="this.$refs.list.delete($event, slotProps.data.id)"
            />
          </div>
          <div class="row mt-1 d-flex justify-content-end">
            <span v-if="slotProps.data.updated" class="badge badge-info">
              {{ new Date(slotProps.data.updated).toLocaleString() }}
            </span>
          </div>
        </template>
      </column>
    </template>
  </crosier-list>
</template>

<script>
import CrosierList from "@/components/crosierList";
import button from "primevue/button";
import Column from "primevue/column";

export default {
  components: {
    CrosierList,
    Column,
    button,
  },
  data() {
    return {
      tableData: [],
      columns: [],
      titulo: "Aplicativos",
      searchTerm: null,
      dropdownOptions: {
        statusOptions: [
          { name: "Selecione", value: null },
          { name: "Ativo", value: true },
          { name: "Inativo", value: false },
        ],
      },
      filterFields: {
        id: null,
        descricao: null,
        ativo: null,
      },
    };
  },
  mounted() {
    this.filterFields = this.$store.state.filterFields;
  },
  methods: {
    async handleFilter() {
      this.$store.commit("setFilterFields", this.filterFields);
      await this.$refs.list.onFilter();
    },
    async clearFilter() {
      this.filterFields = {};
      this.$store.commit("setFilterFields", this.filterFields);
      await this.$refs.list.onFilter();
    },
  },
};
</script>

<style>
.dt-sm-bt {
  height: 30px !important;
  width: 30px !important;
}
</style>
