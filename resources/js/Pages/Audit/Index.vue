<template>
  <the-authenticated-layout>
    <template #header>
      <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
          <li><inertia-link href="/">Inicio</inertia-link></li>
          <li class="is-active">
            <a href="#" aria-current="page">Historial de Actividades</a>
          </li>
        </ul>
      </nav>
    </template>

    <section class="section">
      <table class="table">
        <thead>
          <tr>
            <th><abbr title="Identificador">Id</abbr></th>
            <th>Tiempo</th>
            <th>Descripción</th>
            <th>Usuario</th>
            <th>Método HTTP</th>
            <th>Ruta HTTP</th>
            <th>Dirección IP</th>
            <th>Agente de Usuario</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="activity in activities_log.data" :key="activity.id">
            <th>{{ activity.id }}</th>
            <td>
              {{ activity.created_at }}
            </td>
            <td>
              {{ activity.description }}
            </td>
            <td>
              {{ activity.user_id }}
            </td>
            <td>
              {{ activity.method_type }}
            </td>
            <td>
              {{ activity.http_route }}
            </td>
            <td>
              {{ activity.ip_address }}
            </td>
            <td>
              {{ activity.user_agent }}
            </td>
          </tr>

          <tr v-if="activities_log.data.length === 0">
            <!-- <th>20</th> -->
            <td>
              No existen registros.
            </td>
          </tr>
        </tbody>
      </table>
    </section>

  </the-authenticated-layout>
</template>

<script>
import TheAuthenticatedLayout from '@/Layouts/TheAuthenticated'

export default {
  metaInfo: { title: 'Historial de Actividades' },

  layout: TheAuthenticatedLayout,

  props: {
    filters: Object,
    activities_log: Object
  },

  /*setup() {
    
  },*/
}
</script>
