<template>
  <section class="hero is-info is-fullheight">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
      <nav class="navbar">
        <div class="container">
          <div class="navbar-brand">
            <a class="navbar-item">
              <img
                src="https://bulma.io/images/bulma-type-white.png"
                alt="Logo"
              />
            </a>
            <span class="navbar-burger" data-target="navbarMenuHeroA">
              <span></span>
              <span></span>
              <span></span>
            </span>
          </div>
          <div id="navbarMenuHeroA" class="navbar-menu">
            <div v-if="canLogin" class="navbar-end">
              <inertia-link
                v-if="$page.props.auth.user"
                href="/dashboard"
                class="navbar-item"
              >
                Tablero
              </inertia-link>

              <template v-else>
                <inertia-link
                  v-if="canRegister"
                  :href="route('register')"
                  class="navbar-item"
                >
                  Regístrese
                </inertia-link>
                <span class="navbar-item">
                  <inertia-link
                    :href="route('login')"
                    class="button is-info is-inverted"
                  >
                    <span class="icon">
                      <i class="fas fa-sign-in-alt"></i>
                    </span>
                    <span>Ingresar</span>
                  </inertia-link>
                </span>
              </template>
            </div>
          </div>
        </div>
      </nav>
    </div>

    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
      <div class="container has-text-centered">
        <p class="title">Studium</p>
        <p class="subtitle">Sistema de Gestión Académica en Línea</p>
        <p class="subtitle">
          Proyecto de aprendizaje autodidacta construido con Laravel 8, Inertia
          + Vue 3, Bulma y PostgreSQL 13.
        </p>
      </div>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
      <div class="content has-text-centered">
        <p>
          <strong>Studium</strong> por
          <a href="https://twitter.com/_kimael_">Maikel Carballo</a>. El código
          fuente tiene licencia
          <a href="http://opensource.org/licenses/mit-license.php">MIT</a>.
          2021. Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </p>
      </div>
      <!--
            <nav class="tabs is-boxed is-fullwidth">
                <div class="container">
                    <ul>
                        <li><a>En Construcción</a></li>
                    </ul>
                </div>
            </nav>
            -->
    </div>
  </section>
</template>

<script>
export default {
  props: {
    auth: Object,
    canLogin: Boolean,
    canRegister: Boolean,
    errors: Object,
    laravelVersion: String,
    phpVersion: String,
  },
}
</script>
