<template>
  <article class="message is-info">
    <div class="message-header">
      <p>¿Olvidó su Contraseña?</p>
    </div>
    <div class="message-body">
      No hay problema. Simplemente díganos su dirección de correo electrónico y
      le enviaremos un enlace de restablecimiento de contraseña que le permitirá
      elegir una nueva.
    </div>
  </article>

  <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
    {{ status }}
  </div>

  <app-notification-validation />

  <form @submit.prevent="submit" novalidate>
    <div class="field">
      <label class="label" for="email">Correo Electrónico</label>
      <div class="control has-icons-left has-icons-right">
        <app-input
          id="email"
          type="email"
          :class="{ 'is-danger': errors.email }"
          v-model="form.email"
          required
          autofocus
          autocomplete="username"
        />
        <app-icon-left icon="fas fa-at" />
        <app-icon-right v-if="errors.email" />
        <app-help-text-danger
          v-if="errors.email"
          :message="errors.email"
        />
      </div>
    </div>

    <div class="field is-flex is-justify-content-center">
      <div class="control">
        <app-button
          class="is-info"
          :class="{ 'is-loading': form.processing }"
          :disabled="form.processing"
        >
          Enviar Enlace de Restablecimiento
        </app-button>
      </div>
    </div>
  </form>
</template>

<script>
import TheGuestLayout from '@/Layouts/TheGuest'
import AppButton from '@/Components/AppButton'
import AppHelpTextDanger from '@/Components/AppHelpTextDanger'
import AppIconLeft from '@/Components/AppIconLeft'
import AppIconRight from '@/Components/AppIconRight'
import AppInput from '@/Components/AppInput'
import AppNotificationValidation from '@/Components/AppNotificationValidation'

export default {
  layout: TheGuestLayout,

  components: {
    AppButton,
    AppHelpTextDanger,
    AppIconLeft,
    AppIconRight,
    AppInput,
    AppNotificationValidation,
  },

  props: {
    auth: Object,
    errors: Object,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: '',
      }),
    }
  },

  methods: {
    submit() {
      this.form.post(this.route('password.email'));
    },
  },
}
</script>
