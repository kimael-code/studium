<template>
  <span class="icon is-small is-right">
    <i :class="icon"></i>
  </span>
</template>

<script>
export default {
  props: {
    icon: {
      type: String,
      default: 'fas fa-exclamation-circle'
    }
  }
};
</script>
