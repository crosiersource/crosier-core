<template>
  <CrosierListS
    titulo="Syslog"
    apiResource="/api/core/config/syslog"
    ref="list"
    :filters="this.filters"
    @clearFilter="this.clearFilter"
    @handleFilter="this.handleFilter"
  >
    <template v-slot:filter-fields>
      <div class="form-row">
        <div class="col-md-2">
          <label for="id">ID</label>
          <InputText
            class="form-control"
            id="id"
            type="text"
            v-model="this.filters.id"
          />
        </div>
        <div class="col-md-7">
          <div class="form-group">
            <label for="tipo">Tipo</label>
            <MultiSelect
              class="form-control"
              id="tipo"
              v-model="this.filters.tipo"
              optionLabel="tipo"
              optionValue="tipo"
              :options="this.options.tipo"
              display="chip"
            />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="app">App</label>
            <MultiSelect
              class="form-control"
              id="app"
              v-model="this.filters.app"
              optionLabel="app"
              optionValue="app"
              :options="this.options.app"
              display="chip"
            />
          </div>
        </div>
        <div class="col-md-3">
          <label for="app">Component</label>
          <InputText
            class="form-control"
            id="component"
            type="text"
            v-model="this.filters.component"
          />
        </div>
        <div class="col-md-3">
          <label for="app">Act</label>
          <InputText
            class="form-control"
            id="act"
            type="text"
            v-model="this.filters.act"
          />
        </div>
        <div class="col-md-3">
          <label for="app">Username</label>
          <InputText
            class="form-control"
            id="username"
            type="text"
            v-model="this.filters.username"
          />
        </div>
        <div class="col-md-3">
          <label for="momentIni">Desde</label>
          <InputText
            class="form-control"
            id="momentIni"
            type="text"
            v-model="this.filters.momentIni"
          />
        </div>
        <div class="col-md-3">
          <label for="momentFim">Até</label>
          <InputText
            class="form-control"
            id="momentFim"
            type="text"
            v-model="this.filters.momentFim"
          />
        </div>
        <div class="col-md-3">
          <label for="obs">Obs</label>
          <InputText
            class="form-control"
            id="obs"
            type="text"
            v-model="this.filters.obs"
          />
        </div>
      </div>
    </template>
    <template v-slot:columns>
      <Column
        field="moment"
        header="Moment"
        :sortable="true"
        headerStyle="width: 15%"
      >
        <template class="text-right" #body="slotProps">
          {{ this.moment(slotProps.data.moment).format("DD/MM/YYYY HH:mm:ss") }}
          <br />
          <span class="badge badge-secondary">{{ slotProps.data.id }}</span>
        </template>
      </Column>
      <Column field="app" header="Log">
        <template #body="slotProps">
          <div class="float-left">
            <b>{{ slotProps.data.act }}</b>
            <br />
            <span style="font-size: small; color: lightblue"
              >{{ slotProps.data.app }}:{{ slotProps.data.component }}</span
            >
            <hr />
            <span style="font-size: smaller">{{ slotProps.data.obs }}</span>
          </div>
          <div class="text-right">
            <span class="badge badge-info"
              ><i class="fas fa-user"></i> {{ slotProps.data.username }}</span
            ><br />
            <span
              v-show="slotProps.data.tipo === 'debug'"
              class="badge badge-danger"
              ><i class="fas fa-bug"></i> debug</span
            >
            <span
              v-show="slotProps.data.tipo === 'info'"
              class="badge badge-info"
              ><i class="fas fa-info"></i> info</span
            >
            <br />
            <button
              type="button"
              class="btn btn-sm btn-primary"
              @click="this.showDialog(slotProps.data.id)"
            >
              <i class="fas fa-file" aria-hidden="true"></i> Abrir
            </button>
          </div>
        </template>
      </Column>
    </template>
  </CrosierListS>
  <syslogForm />
</template>

<script>
import CrosierListS from "@/components/crosierListS";
import Column from "primevue/column";
import InputText from "primevue/inputtext";
import MultiSelect from "primevue/multiselect";
import moment from "moment";
import axios from "axios";
import syslogForm from "./form";

export default {
  components: {
    CrosierListS,
    Column,
    InputText,
    MultiSelect,
    syslogForm,
  },
  data() {
    return {
      tableData: [],
      searchTerm: null,
      filters: {
        id: null,
        tipo: null,
        app: null,
        component: null,
        act: null,
        momentIni: null,
        momentFim: null,
        username: null,
        obs: null,
      },
      options: {
        tipo: null,
        app: null,
        component: null,
        username: null,
      },
    };
  },

  async mounted() {
    const rsTipo = await axios.get(`/cfg/syslog/getDistinct?campo=tipo`);
    this.options.tipo = rsTipo.data.DATA.distincts;

    const rsApp = await axios.get(`/cfg/syslog/getDistinct?campo=app`);
    this.options.app = rsApp.data.DATA.distincts;
  },

  methods: {
    moment(date) {
      return moment(date);
    },
    async showDialog(id) {
      this.$store.state.loading = true;
      const rs = await axios.get(`/api/core/config/syslog/${id}`);
      rs.data.moment = new Date(rs.data.moment);
      this.$store.state.syslog = rs.data;
      console.log(rs.data);
      this.$store.state.displayDialog = true;
      this.$store.state.loading = false;
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
