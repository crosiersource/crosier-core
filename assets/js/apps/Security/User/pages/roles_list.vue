<template>
  <div class="card mt-4">
    <div class="card-body">
      <h5 class="card-title">Permissões</h5>

      <CrosierListS
        :withoutCard="true"
        :comFiltragem="false"
        :comPaginador="false"
        :comExportCSV="false"
        apiResource="/api/sec/role"
        dtStateName="groupForm_rolesList"
        :ativarSelecao="true"
        :preselecao="true"
        :filtersStoreName="null"
        v-model:selection="this.fields.userRoles"
      >
        <template v-slot:columns>
          <Column field="role" header="Role" :sortable="true"></Column>
          <Column field="descricao" header="Descrição" :sortable="true"></Column>
        </template>
      </CrosierListS>
    </div>
  </div>
</template>

<script>
import Column from "primevue/column";
import { mapGetters } from "vuex";
import { CrosierListS } from "crosier-vue";

export default {
  name: "roles_list",
  components: {
    CrosierListS,
    Column,
  },

  data() {
    return {
      formUrl: "/v/sec/group/form",
      selection: {
        sel: [],
      },
    };
  },

  methods: {},

  computed: {
    ...mapGetters({ fields: "getFields" }),
  },
};
</script>
