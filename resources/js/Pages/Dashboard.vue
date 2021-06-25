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
    <dashboard-student />
  </the-authenticated-layout>
</template>

<script>
import TheAuthenticatedLayout from '@/Layouts/TheAuthenticated'
import DashboardStudent from '@/Pages/Dashboards/DashboardStudent'

export default {
  components: {
    TheAuthenticatedLayout,
    DashboardStudent,
  },

  props: {
    auth: Object,
    errors: Object,
  },
}
</script>
