<template>
  <div v-if="withoutCard">
    <ProgressBar
      mode="indeterminate"
      :style="
        'height: .5em; margin-bottom: 10px; display: ' +
        (desabilitado ? '' : 'none')
      "
    />
    <form @submit.prevent="this.$emit('handleSubmitForm')">
      <fieldset :disabled="desabilitado">
        <slot></slot>
        <slot name="formChilds"></slot>
        <div class="row mt-3">
          <div class="col text-right">
            <Button
              label="Salvar"
              type="submit"
              icon="fas fa-save"
              v-if="!this.disabledSubmit"
            />
          </div>
        </div>
      </fieldset>
    </form>
  </div>
  <div v-else>
    <div class="container">
      <div class="card" style="margin-bottom: 50px">
        <div class="card-header">
          <div class="d-flex flex-wrap align-items-center">
            <div class="mr-1">
              <h3>{{ titulo }}</h3>
              <h6 v-if="subtitulo">{{ this.subtitulo }}</h6>
            </div>
            <div class="d-sm-flex flex-nowrap ml-auto">
              <Button
                class="p-button-help p-button-text"
                icon="pi pi-arrow-left"
                label="voltar pra lista"
                @click="this.redirectList()"
              />
            </div>
          </div>
        </div>
        <div class="card-body">
          <ProgressBar
            mode="indeterminate"
            :style="
              'height: .5em; margin-bottom: 10px; display: ' +
              (desabilitado ? '' : 'none')
            "
          />
          <form @submit.prevent="this.$emit('handleSubmitForm')">
            <fieldset :disabled="desabilitado">
              <slot></slot>
              <slot name="formChilds"></slot>
              <div class="row mt-3">
                <div class="col text-right">
                  <Button
                    label="Salvar"
                    type="submit"
                    icon="fas fa-save"
                    v-if="!this.disabledSubmit"
                  />
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
  <CrosierBlock :desabilitado="this.desabilitado" />
  <Toast class="mt-5" />
</template>

<script>
import Button from "primevue/button";
import Toast from "primevue/toast";
import { postEntityData } from "@/services/ApiPostService";
import { putEntityData } from "@/services/ApiPutService";
import ProgressBar from "primevue/progressbar";
import CrosierBlock from "./crosierBlock";

export default {
  name: "CrosierForm",
  components: {
    CrosierBlock,
    Button,
    Toast,
    ProgressBar,
  },
  props: {
    titulo: {
      type: String,
      required: true,
    },
    subtitulo: {
      type: String,
      required: false,
    },
    listUrl: {
      type: String,
      required: false,
    },
    apiResource: {
      type: String,
      required: true,
    },
    schemaValidator: {
      type: Object,
      required: true,
    },
    withoutCard: {
      type: Boolean,
      required: false,
    },
    storeName: {
      type: String,
      required: false,
    },
    setStoreName: {
      type: String,
      required: false,
    },
    setStoreErrorsName: {
      type: String,
      required: false,
    },
    hasDependents: {
      type: Boolean,
      required: false,
    },
    notLoadOnMount: {
      type: Boolean,
      required: false,
    },
    notSetUrlId: {
      type: Boolean,
      required: false,
    },
    disabledSubmit: {
      type: Boolean,
      required: false,
    },
  },
  data() {
    return {
      formErrors: {},
      desabilitado: false,
    };
  },
  async mounted() {
    // verify if id is set.
    // and if found the id then set the register in the store
    // the stored fields are reflected in the form
    // else if not found then redirected to empty form
    this.desabilitado = true;
    if (!this.notLoadOnMount) {
      const uri = window.location.search.substring(1);
      const params = new URLSearchParams(uri);
      if (params.get("id")) {
        await this.$store.commit("loadData", {
          id: params.get("id"),
          apiResource: this.apiResource,
          storeName: this.storeName || "formFields",
          hasDependents: this.hasDependents,
        });
        if (this.hasDependents) {
          this.$store.commit("setDependentsId", params.get("id"));
        }
      }
    }

    this.desabilitado = false;
  },
  methods: {
    async submitForm() {
      this.desabilitado = true;
      // local const values receive stored fields that are prefetched or that is typed by users
      // formErrors are setted empty to clean.
      // call yup validator, and if is valid than make an api call (post or put, depedding of id is setted or not)
      // if response ok than store the values of response and redirect to edit form with id setted in the url
      // if yup validation fails then set the errors on store (that is auto reflected in the form)
      const values = this.storeName
        ? this.$store.state[this.storeName]
        : this.$store.state.formFields;

      // inicializa os erros como vazio.
      this.formErrors = [];
      this.$store.commit(this.setStoreErrorsName || "setFormErrors", []);

      // tenta fazer a validação dos campos do yup,
      // caso algum não passe distapa um erro que é tratado no catch.
      try {
        const validated = await this.schemaValidator.validate(values, {
          abortEarly: false,
        });

        // verifica se o @id do formulário esta setado, se sim então a requisição é
        // put(atualização), senão:
        // post(criação).
        let response;
        if (values["@id"]) {
          response = await putEntityData(
            values["@id"],
            JSON.stringify(validated)
          );
        } else {
          response = await postEntityData(
            this.apiResource,
            JSON.stringify(validated)
          );
        }

        // caso o retorno da api seja de sucesso
        if ([200, 201].includes(response.status)) {
          // armazena os novos dados no store correspondente.
          this.$store.commit(
            this.setStoreName || "setFormFields",
            response.data
          );

          // verifica se é necessário atualizar o id da url
          // só é necessário caso o formulário seja de apenas uma entidade
          // ou o formulário seja da entidade principal.
          if (!this.notSetUrlId) {
            window.history.pushState("form", "id", `?id=${response.data.id}`);
          }

          // se o formulário em questão é o principal e existem dependentes
          // chama a funcção para informar aos stores dependentes o @id recebido
          // e vincular à entidade principal.
          if (this.hasDependents) {
            this.$store.commit("setDependentsId", response.data.id);
          }

          // emite a mensagem de sucesso.
          this.showSuccess("Salvo com sucesso!");

          // emite o evento de data saved e caso seja capturado pelo componente que montou o
          // crosierForm, esse pode atualizar os dados de acordo com oque foi retornado sem
          // precisar de uma nova requisição.
          this.$emit("dataSaved", response.data);

          // emite o evento para fechar o modal
          this.$emit("closeModal");
        }
      } catch (err) {
        // em caso de não passar na validação do yup
        // mostramos o erro no console.log
        console.log(err);

        // retornamos os valores ao store para que o formulário não fique vazio
        this.$store.commit(this.setStoreName || "setFormFields", values);

        // percorremos os campos com erros do yup para obter a mensagem do erro,
        // caso exista, senão usamos a mensagem padrão.
        err.inner?.forEach((element) => {
          this.formErrors[element.path] = element.message ?? "Valor inválido";
        });

        // salvamos as mensagens de erro no store correspondente
        this.$store.commit(
          this.setStoreErrorsName || "setFormErrors",
          this.formErrors
        );

        // emitimos a mensagem de erro.
        this.showError("Não foi possível salvar!");
      }
      this.desabilitado = false;
    },
    redirectForm(id = "") {
      window.location.href = `form${id ? `?id=${id}` : ""}`;
    },
    redirectList() {
      window.location.href = this.listUrl;
    },
    // onJsonChange(value) {
    //   this.stored_formFields.jsonData = value;
    // },
    showSuccess(message) {
      this.$toast.add({
        severity: "success",
        summary: "Mensagem de sucesso",
        detail: message,
        life: 3000,
      });
    },
    showError(message) {
      this.$toast.add({
        severity: "error",
        summary: "Mensagem de erro",
        detail: message,
        life: 3000,
      });
    },
  },
};
</script>
