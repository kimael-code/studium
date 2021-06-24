<template>
  <nav
    class="navbar p-3"
    :class="{
      'is-danger': isAdmin,
      'is-warning': isDirector,
      'is-primary': isProfessor,
      'is-info': isStudent
    }"
    role="navigation"
    aria-label="main navigation"
  >
    <div class="navbar-brand">
      <inertia-link class="navbar-item" :href="route('dashboard')">
        <studium-logo  class="is-32x32" />
      </inertia-link>

      <a
        role="button"
        class="navbar-burger"
        aria-label="menu"
        aria-expanded="false"
        data-target="navbarSystem"
        @click="isOpen = !isOpen"
        :class="{'is-active': isOpen}"
      >
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <navbar-menu-admin v-if="isAdmin" :class="{'is-active': isOpen}" />
    <navbar-menu-director v-else-if="isDirector" :class="{'is-active': isOpen}" />
    <navbar-menu-professor v-else-if="isProfessor" :class="{'is-active': isOpen}" />
    <navbar-menu-student v-else :class="{'is-active': isOpen}" />
  </nav>

  <div class="columns is-centered">
    <div class="column is-11">

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
import StudiumLogo from '@/Components/AppLogo'
import NavbarMenuAdmin from '@/Layouts/TheAuthenticatedMenuForAdmin'
import NavbarMenuDirector from '@/Layouts/TheAuthenticatedMenuForDirector'
import NavbarMenuProfessor from '@/Layouts/TheAuthenticatedMenuForProfessor'
import NavbarMenuStudent from '@/Layouts/TheAuthenticatedMenuForStudent'

export default {
  components: {
    StudiumLogo,
    NavbarMenuAdmin,
    NavbarMenuDirector,
    NavbarMenuProfessor,
    NavbarMenuStudent,
  },

  data() {
    return {
      isOpen: false
    }
  },

  computed: {
    isAdmin() {
      return this.$page.props.auth.role === 'Admin'
    },

    isDirector() {
      return this.$page.props.auth.role === 'Director'
    },

    isProfessor() {
      return this.$page.props.auth.role === 'Profesor'
    },

    isStudent() {
      return this.$page.props.auth.role === 'Estudiante'
    },
  },
}
</script>
