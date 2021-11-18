<template>
  <CrosierListS
    titulo="Log do Sistema"
    apiResource="/api/core/config/syslog"
    ref="dt"
    @beforeFilter="this.beforeFilter"
  >
    <template v-slot:filter-fields>
      <div class="form-row">
        <CrosierInputInt id="id" col="3" label="ID" v-model="this.filters.id" />
        <div class="col-md-3">
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
        <CrosierInputText
          id="component"
          col="3"
          label="Component"
          v-model="this.filters.component"
        />
      </div>
      <div class="form-row">
        <CrosierInputText id="act" col="5" label="Action" v-model="this.filters.act" />
        <CrosierInputText id="obs" col="7" label="Obs" v-model="this.filters.obs" />
      </div>
      <div class="form-row">
        <CrosierInputText id="username" col="4" label="Usuário" v-model="this.filters.username" />
        <CrosierCalendar
          label="Desde"
          id="moment_after"
          :showTime="true"
          :showSeconds="true"
          col="4"
          v-model="this.filters['moment[after]']"
        />
        <CrosierCalendar
          label="Até"
          id="moment_before"
          :showTime="true"
          :showSeconds="true"
          col="4"
          v-model="this.filters['moment[before]']"
        />
      </div>
    </template>

    <template v-slot:columns>
      <Column field="moment" header="Moment" :sortable="true" headerStyle="width: 15%">
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
            <span v-show="slotProps.data.tipo === 'debug'" class="badge badge-danger"
              ><i class="fas fa-bug"></i> debug</span
            >
            <span v-show="slotProps.data.tipo === 'info'" class="badge badge-info"
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
import Column from "primevue/column";
import MultiSelect from "primevue/multiselect";
import moment from "moment";
import axios from "axios";
import { mapGetters, mapMutations } from "vuex";
import { CrosierListS, CrosierCalendar, CrosierInputText, CrosierInputInt } from "crosier-vue";
import syslogForm from "./form";

export default {
  components: {
    CrosierListS,
    Column,
    CrosierInputText,
    CrosierInputInt,
    MultiSelect,
    syslogForm,
    CrosierCalendar,
  },
  data() {
    return {
      tableData: [],
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
    ...mapMutations(["setLoading"]),

    moment(date) {
      return moment(date);
    },

    beforeFilter() {
      this.filters["moment[after]"] = this.filters["moment[after]"]
        ? `${moment(this.filters["moment[after]"]).format("YYYY-MM-DD")}T00:00:00-03:00`
        : null;
      this.filters["moment[before]"] = this.filters["moment[before]"]
        ? `${moment(this.filters["moment[before]"]).format("YYYY-MM-DD")}T23:59:59-03:00`
        : null;
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

  computed: {
    ...mapGetters({ filters: "getFilters" }),
  },
};
</script>

<style>
.dt-sm-bt {
  height: 30px !important;
  width: 30px !important;
}
</style>
