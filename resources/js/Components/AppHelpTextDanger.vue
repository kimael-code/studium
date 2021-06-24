<template>
  <p class="help is-danger">
    {{ message }}
  </p>
</template>

<script>
export default {
  props: {
    message: {
      type: String,
      default: 'Error desconocido'
    }
  },
}
</script>