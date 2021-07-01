<template>
  <the-authenticated-layout>
    <template #header>
      <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
          <li><inertia-link href="/">Inicio</inertia-link></li>
          <li class="is-active"><a href="#" aria-current="page">Tablero</a></li>
        </ul>
      </nav>
    </template>

    <!--
    <section class="section">
      <h1 class="title">¡Bienvenido estimado usuario!</h1>
      <h2 class="subtitle">
        En construcción.
      </h2>
    </section>

    <article class="content">
      <p>
        Studium todavía está en pleno desarrollo. Su tablero tendrá un mejor
        aspecto y le presentará información relevante cuando alcance un
        desarrollo estable.
      </p>
    </article>
    -->
    <dashboard-admin v-if="isAdmin" />
    <dashboard-director v-else-if="isDirector" />
    <dashboard-professor v-else-if="isProfessor" />
    <dashboard-student v-else />
  </the-authenticated-layout>
</template>

<script>
import TheAuthenticatedLayout from '@/Layouts/TheAuthenticated'
import DashboardAdmin from '@/Pages/Dashboards/DashboardAdmin'
import DashboardDirector from '@/Pages/Dashboards/DashboardDirector'
import DashboardProfessor from '@/Pages/Dashboards/DashboardProfessor'
import DashboardStudent from '@/Pages/Dashboards/DashboardStudent'

export default {
  components: {
    TheAuthenticatedLayout,
    DashboardAdmin,
    DashboardDirector,
    DashboardProfessor,
    DashboardStudent,
  },

  props: {
    auth: Object,
    errors: Object,
    dashboardData: Object,
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
