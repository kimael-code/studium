<template>
  <span class="icon is-small is-right has-text-danger">
    <i :class="icon"></i>
  </span>
</template>

<script>
export default {
  props: {
    icon: {
      type: String,
      default: 'fas fa-exclamation-circle',
    },
  },
}
</script>
