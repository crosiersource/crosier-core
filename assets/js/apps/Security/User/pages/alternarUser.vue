<template>
  <Toast position="bottom-right" class="mt-5" />
  <CrosierBlock :loading="this.loading" />

  <div class="container">
    <div class="card" style="margin-bottom: 50px">
      <div class="card-header">
        <div class="d-flex flex-wrap align-items-center">
          <div class="mr-1">
            <h3>Alternar Usuário</h3>
          </div>
          <div class="d-sm-flex flex-nowrap ml-auto"></div>
        </div>
      </div>
      <div class="card-body">
        <div class="form-row">
          <CrosierDropdown
            v-if="this.users"
            v-model="this.aux.user"
            label="Alterar para..."
            :options="this.users"
            optionLabel="descricaoMontada"
            optionValue="id"
          />
        </div>
        <div class="form-row">
          <div class="col text-right">
            <button
              class="btn btn-sm btn-primary"
              style="width: 12rem"
              type="button"
              icon="fas fa-save"
              @click="this.alternarUser"
            >
              <i class="fas fa-people-arrows"></i> Alternar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Toast from "primevue/toast";
import { CrosierDropdown, CrosierBlock, submitForm } from "crosier-vue";
import { mapGetters, mapMutations, mapActions } from "vuex";

export default {
  name: "alternarUser",

  components: {
    CrosierDropdown,
    CrosierBlock,
    Toast,
  },

  data() {
    return {
      schemaValidator: {},
      serverParams: {},
      emailEnviadoOuNao: false,
    };
  },

  async mounted() {
    this.setLoading(true);
    await this.loadData();
    this.setLoading(false);
  },

  methods: {
    ...mapMutations(["setLoading"]),
    ...mapActions(["loadData"]),

    async alternarUser() {
      // find the user from this.users by this.aux.user.id
      this.setLoading(true);
      const user = this.users.find((u) => u.id === this.aux.user);
      window.location = `?_switch_user=${user.username}`;
      console.log(user);
    },
  },

  computed: {
    ...mapGetters({
      loading: "isLoading",
      users: "getUsers",
      aux: "getAux",
    }),
  },
};
</script>
