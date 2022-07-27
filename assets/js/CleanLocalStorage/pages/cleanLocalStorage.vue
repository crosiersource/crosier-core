<template>
  <ConfirmDialog />
  <Toast position="bottom-right" class="mt-5" />
  <button type="button" class="btn btn-danger m-5" @click="this.clearLocalStorage">
    <i class="fas fa-trash"></i> Limpar o Local Storage
  </button>
  <button type="button" class="btn btn-danger m-5" @click="this.deleteAllCookies">
    <i class="fas fa-trash"></i> Limpar todos os cookies do Crosier
  </button>
</template>

<script>
import ConfirmDialog from "primevue/confirmdialog";
import Toast from "primevue/toast";

export default {
  name: "cleanLocalStorage",
  components: {
    Toast,
    ConfirmDialog,
  },

  methods: {
    clearLocalStorage() {
      this.$confirm.require({
        acceptLabel: "Sim",
        rejectLabel: "Não",
        message: "Confirmar?",
        header: "Atenção!",
        icon: "pi pi-exclamation-triangle",
        accept: () => {
          localStorage.clear();
        },
      });
    },

    deleteAllCookies() {
      this.$confirm.require({
        acceptLabel: "Sim",
        rejectLabel: "Não",
        message: "Confirmar?",
        header: "Atenção!",
        icon: "pi pi-exclamation-triangle",
        accept: () => {
          (function () {
            const cookies = document.cookie.split("; ");
            for (let c = 0; c < cookies.length; c++) {
              const d = window.location.hostname.split(".");
              while (d.length > 0) {
                const cookieBase = `${encodeURIComponent(
                  cookies[c].split(";")[0].split("=")[0]
                )}=; expires=Thu, 01-Jan-1970 00:00:01 GMT; domain=${d.join(".")} ;path=`;
                const p = location.pathname.split("/");
                document.cookie = `${cookieBase}/`;
                while (p.length > 0) {
                  document.cookie = cookieBase + p.join("/");
                  p.pop();
                }
                d.shift();
              }
            }
          })();

          document.cookie =
            "CRSRRMMBRMTK=; expires=Thu, 01-Jan-1970 00:00:01 GMT; domain=.crosier.dev ;path=/";
          document.cookie =
            "CRSRSESSNCK5=; expires=Thu, 01-Jan-1970 00:00:01 GMT; domain=.crosier.dev ;path=/";

          history.go(0);
        },
      });
    },
  },
};
</script>
