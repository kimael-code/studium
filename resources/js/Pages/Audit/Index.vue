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

      <nav class="panel box">
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

      <section class="section box">
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
                  {{ activity.timeSince }}
                </td>
                <td>
                  {{ activity.description }}
                </td>
                <td>
                  {{ activity.userDetails ? activity.userDetails.email : 'no registrado' }}
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
                  <app-icon
                    :icon="userAgent(activity.userAgentDetails).platformIcon"
                  />
                  <app-icon
                    :icon="userAgent(activity.userAgentDetails).browserIcon"
                  />
                  <app-tag
                    :tag="userAgent(activity.userAgentDetails).numVersion"
                  />
                  <app-tag :tag="activity.langDetails" />
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
import AppIcon from '@/Components/AppIcon'
import AppIconLeft from '@/Components/AppIconLeft'
import AppIconText from '@/Components/AppIconText'
import AppInput from '@/Components/AppInput'
import AppPagination from '@/Components/AppPagination'
import AppTag from '@/Components/AppTag'
import pickBy from 'lodash/pickBy'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'

export default {
  //metaInfo: { title: 'Historial de Actividades' },

  components: {
    TheAuthenticatedLayout,
    AppIcon,
    AppIconLeft,
    AppIconText,
    AppInput,
    AppPagination,
    AppTag,
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
          //only: ['activities_log'],
        });
      }, 150),
      deep: true,
    },
  },

  methods: {
    reset() {
      this.form = mapValues(this.form, () => null);
    },
    userAgent(userAgentInfo) {
      let platformIcon = 'fas fa-question-circle'
      let browserIcon = 'fas fa-globe'

      switch (userAgentInfo.platform) {
        case 'Windows':
          platformIcon = 'fab fa-windows';
          break;

        case 'iPad':
          platformIcon = 'fas fa-tablet-alt';
          break;

        case 'iPhone':
          platformIcon = 'fas fa-mobile';
          break;

        case 'Macintosh':
          platformIcon = 'fab fa-apple';
          break;

        case 'Android':
          platformIcon = 'fab fa-android';
          break;

        case 'BlackBerry':
          platformIcon = 'fab fa-blackberry';
          break;

        case 'Unix':
        case 'X11':
        case 'Linux':
          platformIcon = 'fab fa-linux fa-fw';
          break;

        case 'CrOS':
          platformIcon = 'fab fa-chrome';
          break;

        default:
          platformIcon;
          break;
      }

      switch (userAgentInfo.browser) {
        case 'Chrome':
          browserIcon = 'fab fa-chrome fa-fw';
          break;

        case 'Firefox':
          browserIcon = 'fab fa-firefox-browser';
          break;

        case 'Opera':
          browserIcon = 'fab fa-opera';
          break;

        case 'Safari':
          browserIcon = 'fab fa-safari';
          break;

        case 'Internet Explorer':
          if (userAgentInfo.version < 38) {
            browserIcon = 'fab fa-internet-explorer';
          }
          if (userAgentInfo.version >= 38 && userAgentInfo.version < 74) {
            browserIcon = 'fab fa-edge-legacy';
          }
          if (userAgentInfo.version > 74) {
            browserIcon = 'fab fa-edge';
          }
          break;

        default:
          browserIcon;
          break;
      }

      return {
        'platformIcon': platformIcon,
        'browserIcon': browserIcon,
        'numVersion': userAgentInfo.version,
      }
    },
  },
};
</script>
