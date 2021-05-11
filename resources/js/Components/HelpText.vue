<template>
  <p class="help" :class="type">{{ message }}</p>
</template>

<script>
export default {
  props: {
    type: {
      type: String,
      default: ''
    },
    message: {
      type: String,
      required: true
    }
  }
};
</script>
