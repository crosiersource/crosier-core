<template>
  <Toast group="mainToast" position="bottom-right" class="mb-5" />
  <ConfirmDialog group="confirmDialog_crosierListS" />

  <CrosierListS
    titulo="Usuários"
    apiResource="/api/sec/user/"
    :formUrl="this.formUrl"
    ref="dt"
    filtrosNaSidebar
  >
    <template v-slot:filter-fields>
      <CrosierInputText id="username" label="Usuário" v-model="this.filters.username" />
    </template>

    <template v-slot:columns>
      <Column field="id" header="Id" :sortable="true">
        <template #body="r">
          {{ ("00000000" + r.data.id).slice(-8) }}
        </template>
      </Column>

      <Column field="username" header="Usuário" :sortable="true"></Column>

      <Column field="email" header="E-mail" :sortable="true"></Column>

      <Column field="nome" header="Nome" :sortable="true"></Column>

      <Column field="isActive" header="Ativo" :sortable="true">
        <template class="text-center" #body="r">
          {{ r.data.isActive ? "Sim" : "Não" }}
        </template>
      </Column>

      <Column field="updated" header="" :sortable="true">
        <template class="text-right" #body="r">
          <div class="d-flex justify-content-end">
            <a
              role="button"
              class="btn btn-primary btn-sm"
              title="Editar registro"
              :href="this.formUrl + '?id=' + r.data.id"
              ><i class="fas fa-wrench" aria-hidden="true"></i
            ></a>
            <a
              role="button"
              class="btn btn-danger btn-sm ml-1"
              title="Deletar registro"
              @click="this.$refs.dt.deletar(r.data.id)"
              ><i class="fas fa-trash" aria-hidden="true"></i
            ></a>
          </div>
          <div class="d-flex justify-content-end mt-1">
            <span
              v-if="r.data.updated"
              class="badge badge-info"
              title="Última alteração do registro"
            >
              {{ new Date(r.data.updated).toLocaleString() }}
            </span>
          </div>
        </template>
      </Column>
    </template>
  </CrosierListS>
</template>

<script>
import { mapGetters, mapMutations } from "vuex";
import { CrosierListS, CrosierInputText } from "crosier-vue";
import Column from "primevue/column";
import Toast from "primevue/toast";
import ConfirmDialog from "primevue/confirmdialog";

export default {
  components: {
    CrosierListS,
    CrosierInputText,
    Column,
    Toast,
    ConfirmDialog,
  },
  data() {
    return {
      formUrl: "/v/sec/user/form",
    };
  },

  methods: {
    ...mapMutations(["setLoading"]),
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
