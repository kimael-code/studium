<template>
  <div class="columns is-centered section is-medium">
    <div class="column is-3 container">
      <div class="card is-one-fifth">
        <div class="is-flex is-justify-content-center card-image mt-4">
          <figure class="image is-64x64 mt-4">
            <inertia-link href="/">
              <breeze-application-logo />
            </inertia-link>
          </figure>
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
import BreezeApplicationLogo from "@/Components/ApplicationLogo";

export default {
  components: {
    BreezeApplicationLogo,
  },
};
</script>
