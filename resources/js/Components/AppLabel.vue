<template>
  <label class="label">
    <span v-if="value">{{ value }}</span>
    <span v-else><slot /></span>
  </label>
</template>

<script>
export default {
  props: {
    value: String
  }
}
</script>
