<template>
  <div>
    <nav class="navbar is-info p-3" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <inertia-link class="navbar-item" :href="route('dashboard')">
          <studium-logo width="112" height="28" />
        </inertia-link>

        <a
          role="button"
          class="navbar-burger"
          aria-label="menu"
          aria-expanded="false"
          data-target="navbarSystem"
        >
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="navbarSystem" class="navbar-menu">
        <div class="navbar-start">
          <inertia-link
            class="navbar-item"
            :href="route('dashboard')"
            :active="route().current('dashboard')"
          >
            Tablero
          </inertia-link>

          <a class="navbar-item"> Ayuda </a>
        </div>

        <div class="navbar-end">
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              {{ $page.props.auth.user.name }}
              {{ $page.props.auth.user.email }}
            </a>
            <div class="navbar-dropdown">
              <!-- <a class="navbar-item"> Perfil </a> -->
              <!-- <a class="navbar-item"> Mi Actividad </a> -->
              <!-- <a class="navbar-item"> Otros </a> -->
              <hr class="navbar-divider" />
              <inertia-link
                class="navbar-item"
                :href="route('logout')"
                method="post"
              >
                Cerrar Sesión
              </inertia-link>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <div class="columns is-centered">
    <div class="column is-three-quarters">

      <!-- Page Heading -->
      <header v-if="$slots.header">
        <div class="box">
          <slot name="header" />
        </div>
      </header>

      <!-- Page Content -->
      <main>
        <div class="box mt-4">
          <slot />
        </div>
      </main>
    </div>
  </div>
</template>

<script>
import StudiumLogo from '@/Components/BaseLogo'

export default {
  components: {
    StudiumLogo,
  },

  data() {
    return {
      showingNavigationDropdown: false,
    };
  },
};
</script>
