<template>
  <crosier-list
    :titulo="titulo"
    :apiResource="'/api/ekt/fat-d200/'"
    :columns="columns"
    formUrl="form"
    ref="list"
    @clearFilter="this.clearFilter"
    @handleFilter="this.handleFilter"
  >
    <template v-slot:filter-fields>
      <div class="form-row">
        <div class="col-md-2">
          <label for="id">ID</label>
          <InputText class="form-control" id="id" type="text" v-model="this.filterFields.id" />
        </div>
        <div class="col-md-7">
          <label for="nome">Nome</label>
          <InputText class="form-control" id="nome" type="text" v-model="this.filterFields.nome" />
        </div>
        <div class="col-md-3">
          <label for="cpf">CPF</label>

          <InputMask class="form-control" id="cpf" type="text" mask="?999.999.999-99" v-model="this.filterFields.cpf" />
        </div>
      </div>
    </template>
    <template v-slot:columns>
      <Column field="id" header="id" :sortable="true"></Column>
      <Column field="nome" header="Cliente" :sortable="true"></Column>
      <Column field="dtAgendamento" header="Dt Agendamento" :sortable="true">
        <template class="text-right" #body="slotProps">
          {{ this.moment(slotProps.data.emissao).format("DD/MM/YYYY") }}
        </template>
      </Column>
      <Column field="updated" header="" :sortable="true">
        <template class="text-right" #body="slotProps">
          <div class="row d-flex justify-content-end">
            <Button
              icon="pi pi-pencil"
              class="mr-2 p-button-rounded p-button-sm p-button-info dt-sm-bt"
              v-tooltip="'Editar'"
              @click="this.$refs.list.redirectForm(slotProps.data.id)"
            />
            <Button
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
      </Column>
    </template>
  </crosier-list>
</template>

<script>
import CrosierList from "@/components/crosierList";
import Button from "primevue/button";
import Column from "primevue/column";
import InputText from "primevue/inputtext";
import InputMask from "primevue/inputmask";
import moment from "moment";

export default {
  name: "profissional_list",
  components: {
    Button,
    CrosierList,
    Column,
    InputText,
    InputMask,
  },
  data() {
    return {
      tableData: [],
      columns: [],
      titulo: "Pré-Vendas",
      searchTerm: null,
      filterFields: {
        id: null,
        nome: null,
        cpf: null,
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
    moment(date) {
      return moment(date);
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
