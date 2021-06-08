<template>
  <div class="columns is-centered section is-medium">
    <div class="column is-3 container">
      <div class="card is-one-fifth">
        <div class="card-image is-flex is-justify-content-center">
          <inertia-link href="/">
            <studium-logo class="is-64x64 mt-4" />
          </inertia-link>
        </div>
        <div class="card-content">
          <div class="content">
            <slot />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import StudiumLogo from '@/Components/BaseLogo'

export default {
  components: {
    StudiumLogo,
  },
}
</script>
