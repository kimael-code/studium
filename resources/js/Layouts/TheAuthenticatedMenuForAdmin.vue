<template>
  <div id="navbarSystem" class="navbar-menu">
    <div class="navbar-start">
      <inertia-link
        class="navbar-item"
        :href="route('dashboard')"
        :class="{'is-active': route().current('dashboard')}"
      >
        Tablero
      </inertia-link>

      <a class="navbar-item"> Liceos </a>
      <a class="navbar-item"> Directores </a>
      <a class="navbar-item"> Profesores </a>
      <a class="navbar-item"> Estudiantes </a>
      <inertia-link
        class="navbar-item"
        :href="route('activities-logs')"
        :class="{'is-active': route().current('activities-logs')}"
      >
        Historial de Actividades
      </inertia-link>
    </div>

    <div class="navbar-end">
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          {{ $page.props.auth.user.name }}
          {{ $page.props.auth.user.email }}
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item"> Mi Actividad (en construcción) </a>
          <hr class="navbar-divider" />
          <a class="navbar-item"> Otros (en construcción) </a>
        </div>
      </div>

      <div class="navbar-item">
        <div class="buttons">
          <inertia-link
            class="button is-dark is-outlined"
            :href="route('logout')"
            method="post"
            as="button"
          >
            <span class="icon">
              <i class="fas fa-sign-out-alt"></i>
            </span>
            <span>Salir</span>
          </inertia-link>
        </div>
      </div>
    </div>
  </div>
</template>
