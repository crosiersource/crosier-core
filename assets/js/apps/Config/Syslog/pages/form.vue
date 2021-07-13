<template>
  <Dialog header="Syslog" v-model:visible="this.$store.state.displayDialog" modal="true">
    <div class="container">
      <div class="card" style="margin-bottom: 50px">
        <div class="card-body">
          <div class="form-row">
            <div class="col-md-2">
              <div class="form-group">
                <label for="id">ID</label>
                <InputText
                  class="form-control"
                  id="id"
                  type="text"
                  v-model="this.syslog.id"
                  disabled
                />
              </div>
            </div>
            <div class="col-md-10">
              <div class="form-group">
                <label for="moment">Moment</label>
                <Calendar
                  class="form-control"
                  id="moment"
                  dateFormat="dd/mm/yy"
                  hourFormat="24"
                  :showTime="true"
                  v-model="this.syslog.moment"
                  disabled
                />
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="id">Tipo</label>
                <InputText
                  class="form-control notuppercase"
                  id="tipo"
                  type="text"
                  v-model="this.syslog.tipo"
                  disabled
                />
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label for="id">App</label>
                <InputText
                  class="form-control notuppercase"
                  id="app"
                  type="text"
                  v-model="this.syslog.app"
                  disabled
                />
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="id">Component</label>
                <InputText
                  class="form-control notuppercase"
                  id="component"
                  type="text"
                  v-model="this.syslog.component"
                  disabled
                />
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="id">Usuário</label>
                <InputText
                  class="form-control notuppercase"
                  id="username"
                  type="text"
                  v-model="this.syslog.username"
                  disabled
                />
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="id">Act</label>
                <Textarea
                  class="form-control notuppercase"
                  rows="5"
                  id="act"
                  type="text"
                  v-model="this.syslog.act"
                  disabled
                />
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="id">Obs</label>
                <Textarea
                  class="form-control notuppercase"
                  rows="10"
                  cols="140"
                  id="obs"
                  type="text"
                  v-model="this.syslog.obs"
                  disabled
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Dialog>
</template>

<script>
import Dialog from "primevue/dialog";
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Calendar from "primevue/calendar";

export default {
  components: {
    Dialog,
    InputText,
    Textarea,
    Calendar,
  },

  computed: {
    syslog() {
      return this.$store.state.syslog;
    },
  },
};
</script>
