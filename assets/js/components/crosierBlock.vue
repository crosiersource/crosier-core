<template>
  <div v-if="desabilitado" class="block"></div>
</template>

<script>
export default {
  props: {
    desabilitado: {
      type: Boolean,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
.block {
  height: 100%;
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  background: #333;
  opacity: 0.1;
}
</style>
