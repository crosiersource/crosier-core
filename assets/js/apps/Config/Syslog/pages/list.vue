<template>
  <CrosierListS
    filtrosNaSidebar
    titulo="Log do Sistema"
    apiResource="/api/core/config/syslog"
    ref="dt"
    @beforeFilter="this.beforeFilter"
  >
    <template v-slot:filter-fields>
      <CrosierInputInt id="id" label="ID" v-model="this.filters.id" />

      <CrosierMultiSelect
        label="Tipo"
        id="tipo"
        v-model="this.filters.tipo"
        optionLabel="tipo"
        optionValue="tipo"
        :options="this.options.tipo"
      />

      <CrosierMultiSelect
        label="App"
        id="app"
        v-model="this.filters.app"
        optionLabel="app"
        optionValue="app"
        :options="this.options.app"
      />

      <CrosierInputText id="uuid_sess" label="UUID Sess" v-model="this.filters.uuidSess" />

      <CrosierInputText id="component" label="Component" v-model="this.filters.component" />

      <CrosierInputText id="act" label="Action" v-model="this.filters.act" />

      <CrosierInputText id="obs" label="Obs" v-model="this.filters.obs" />

      <CrosierInputText id="username" label="Usuário" v-model="this.filters.username" />

      <div class="form-row">
        <CrosierCalendar
          label="Desde"
          id="moment_after"
          showTime
          showSeconds
          col="6"
          v-model="this.filters['moment[after]']"
        />
        <CrosierCalendar
          label="Até"
          id="moment_before"
          showTime
          showSeconds
          col="6"
          v-model="this.filters['moment[before]']"
        />
      </div>
    </template>

    <template v-slot:columns>
      <Column field="moment" header="Moment" :sortable="true" headerStyle="width: 15%">
        <template class="text-right" #body="r">
          {{ this.moment(r.data.moment).format("DD/MM/YYYY HH:mm:ss") }}
          <br />
          <span class="badge badge-secondary">{{ r.data.id }}</span>
          <div class="small">
            <a :href="this.getUuidSessLink(r.data.uuidSess)">{{ r.data.uuidSess }}</a>
          </div>
        </template>
      </Column>

      <Column field="app" header="Log">
        <template #body="r">
          <div class="float-left">
            <b>{{ r.data.act }}</b>
            <br />
            <span style="font-size: small; color: lightblue"
              >{{ r.data.app }}:{{ r.data.component }}</span
            >
            <hr />
            <span style="font-size: smaller">{{ r.data.obs }}</span>
          </div>
          <div class="text-right">
            <span class="badge badge-info"><i class="fas fa-user"></i> {{ r.data.username }}</span
            ><br />
            <span v-show="r.data.tipo === 'debug'" class="badge badge-danger"
              ><i class="fas fa-bug"></i> debug</span
            >
            <span v-show="r.data.tipo === 'info'" class="badge badge-info"
              ><i class="fas fa-info"></i> info</span
            >
            <br />
            <button
              type="button"
              class="btn btn-sm btn-primary"
              @click="this.showDialog(r.data.id)"
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
import moment from "moment";
import axios from "axios";
import { mapGetters, mapMutations } from "vuex";
import {
  CrosierCalendar,
  CrosierInputInt,
  CrosierInputText,
  CrosierListS,
  CrosierMultiSelect,
} from "crosier-vue";
import syslogForm from "./form";

export default {
  components: {
    CrosierListS,
    Column,
    CrosierInputText,
    CrosierInputInt,
    CrosierMultiSelect,
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
      this.$store.state.displayDialog = true;
      this.$store.state.loading = false;
    },

    getUuidSessLink(uuidSess) {
      return `?filters={"uuidSess":"${uuidSess}"}`;
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
