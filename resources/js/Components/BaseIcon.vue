<template>
  <span class="icon">
    <i :class="icon"></i>
  </span>
</template>

<script>
export default {
  props: {
    icon: {
      type: String,
      required: true,
    },
  },
}
</script>
