<template>
  <div>
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

      <nav class="panel">
        <p class="panel-heading">Filtrar Historial</p>
        <p class="panel-tabs">
          <a class="is-active">Aplicar los siguientes Filtros</a>
        </p>
        <div class="panel-block">
          <p class="control has-icons-left">
            <app-input
              v-model="form.user"
              type="text"
              name="user"
              placeholder="Filtrar por Usuario"
            />
            <app-icon-left icon="fas fa-search" aria-hidden="true" />
          </p>
        </div>
        <div class="panel-block">
          <p class="control has-icons-left">
            <app-input
              v-model="form.ip_dir"
              type="text"
              name="ip_dir"
              placeholder="Filtrar por IP"
            />
            <app-icon-left icon="fas fa-search" aria-hidden="true" />
          </p>
        </div>
        <div class="panel-block">
          <p class="control has-icons-left">
            <app-input
              v-model="form.http_route"
              type="text"
              name="http_route"
              placeholder="Filtrar por Ruta"
            />
            <app-icon-left icon="fas fa-search" aria-hidden="true" />
          </p>
        </div>

        <div class="panel-block">
          <button class="button is-dark is-outlined is-rounded is-fullwidth" @click="reset">
            <span>Quitar Filtros</span>
            <span class="icon is-small">
              <i class="fas fa-times"></i>
            </span>
          </button>
        </div>
      </nav>

      <section class="section">
        <div class="table-container">
          <table class="table is-fullwidth">
            <thead>
              <tr>
                <th class="has-text-centered">
                  <abbr title="Identificador">Id</abbr>
                </th>
                <th class="has-text-centered">Tiempo</th>
                <th class="has-text-centered">Descripción</th>
                <th class="has-text-centered">Usuario</th>
                <th class="has-text-centered">Método HTTP</th>
                <th class="has-text-centered">Ruta HTTP</th>
                <th class="has-text-centered">Dirección IP</th>
                <th class="has-text-centered">Agente de Usuario</th>
              </tr>
            </thead>

            <tbody>
              <tr
                v-for="activity in activities_log.data || []"
                :key="activity.id"
              >
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
                <td class="has-text-centered" colspan="8">No existen registros.</td>
              </tr>
            </tbody>
          </table>
        </div>
        <app-pagination
          :links="activities_log.links"
          :nextpage="activities_log.next_page_url"
          :prevpage="activities_log.prev_page_url"
        />
      </section>
    </the-authenticated-layout>
  </div>
</template>

<script>
import TheAuthenticatedLayout from '@/Layouts/TheAuthenticated'
import AppIconLeft from '@/Components/AppIconLeft'
import AppInput from '@/Components/AppInput'
import AppPagination from '@/Components/AppPagination'
import pickBy from 'lodash/pickBy'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'

export default {
  //metaInfo: { title: 'Historial de Actividades' },

  components: {
    TheAuthenticatedLayout,
    AppIconLeft,
    AppInput,
    AppPagination,
  },

  props: {
    auth: Object,
    errors: Object,
    filters: Object,
    activities_log: Object,
  },

  setup(props) {
    console.log(props)
  },

  data() {
    return {
      form: {
        user: this.filters.user,
        ip_dir: this.filters.ip_dir,
        http_route: this.filters.http_route,
      },
    }
  },

  watch: {
    form: {
      handler: throttle(function () {
        this.$inertia.get(this.route('activities-logs'), pickBy(this.form), {
          preserveState: true,
          only: ['activities_log'],
        });
      }, 150),
      deep: true,
    },
  },

  methods: {
    reset() {
      this.form = mapValues(this.form, () => null);
    },
  },
};
</script>
