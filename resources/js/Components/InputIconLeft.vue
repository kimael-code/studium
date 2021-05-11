<template>
  <span class="icon is-small is-left">
    <i :class="icon"></i>
  </span>
</template>

<script>
export default {
  props: {
    icon: {
      type: String,
      default: 'fas fa-keyboard'
    }
  }
};
</script>
