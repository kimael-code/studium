<template>
  <span class="tag">{{ tag }}</span>
</template>

<script>
export default {
  props: {
    tag: {
      type: String,
      required: true,
    },
  },
}
</script>
