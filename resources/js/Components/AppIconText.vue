<template>
  <span class="icon-text">
    <span class="icon">
      <i :class="icon"></i>
    </span>
    <span v-if="tag">{{ tag }}</span>
    <slot v-else />
  </span>
</template>

<script>
export default {
  props: {
    icon: {
      type: String,
      required: true,
    },
    tag: String,
  },
}
</script>
