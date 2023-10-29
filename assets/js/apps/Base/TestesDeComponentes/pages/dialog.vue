<template>
  <Dialog
    header="Um dialog"
    v-model:visible="this.$store.state.exibirDialog"
    :style="{ width: '55vw' }"
    :modal="true"
    ref="dialog"
  >
    <div class="row">
      <div class="col-12">Oi</div>
    </div>
    <div class="row">
      <CrosierDropdownBoolean
        label="Um CrosierDropdownBoolean"
        v-model="this.valorBooleano"
        col="11"
      />

      <button type="button" @click="this.confirmar()" class="btn btn-primary col-1">
        Confirmar
      </button>
    </div>
  </Dialog>
</template>

<script>
import Dialog from "primevue/dialog";
import { CrosierDropdownBoolean } from "crosier-vue";
import { mapMutations } from "vuex";

export default {
  name: "appConfigForm",
  components: {
    Dialog,
    CrosierDropdownBoolean,
  },

  data() {
    return {
      valorBooleano: true,
    };
  },

  methods: {
    ...mapMutations(["setLoading"]),

    confirmar() {
      this.$confirm.require({
        acceptLabel: "Sim",
        rejectLabel: "Não",
        message: "Confirmar a operação?",
        header: "Atenção!",
        icon: "pi pi-exclamation-triangle",
        accept: async () => {
          this.setLoading(true);

          this.setLoading(false);
        },
      });
    },
  },
};
</script>
