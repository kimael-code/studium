<template>
  <nav class="pagination is-rounded" role="navigation" aria-label="paginación">
    <inertia-link
      v-if="links.length > 1 && prevpage"
      class="pagination-previous"
      :href="prevpage"
      >Anterior</inertia-link
    >
    <inertia-link
      v-if="links.length > 1 && nextpage"
      class="pagination-next"
      :href="nextpage"
      >Siguiente</inertia-link
    >
    <ul class="pagination-list">
      <template v-for="(link, key) in pages" :key="key">
        <li v-if="link.active">
          <inertia-link
            class="pagination-link is-current"
            aria-label="Página"
            aria-current="página"
            :href="link.url"
          >
            {{ link.label }}
          </inertia-link>
        </li>
        <li v-else>
          <inertia-link
            class="pagination-link"
            aria-label="Ir a página"
            :href="link.url"
          >
            {{ link.label }}
          </inertia-link>
        </li>
      </template>
    </ul>
  </nav>
</template>

<script>
export default {
  props: {
    links: Array,
    nextpage: String,
    prevpage: String,
  },

  computed: {
    pages() {
      this.links.pop()
      this.links.shift()

      return this.links
    }
  },
};
</script>