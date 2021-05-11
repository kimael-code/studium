<template>
  <div v-if="hasErrors" class="notification is-danger">
    <strong>Por favor, corrija los campos resaltados en rojo.</strong>
  </div>
</template>

<script>
export default {
  computed: {
    errors() {
      return this.$page.props.errors;
    },

    hasErrors() {
      return Object.keys(this.errors).length > 0;
    },
  },
};
</script>
