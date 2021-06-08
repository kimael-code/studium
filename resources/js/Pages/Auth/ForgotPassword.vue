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

  <base-notification-validation />

  <form @submit.prevent="submit" novalidate>
    <div class="field">
      <label class="label" for="email">Correo Electrónico</label>
      <div class="control has-icons-left has-icons-right">
        <base-input
          id="email"
          type="email"
          class="is-rounded"
          :class="{ 'is-danger': errors.email }"
          v-model="form.email"
          required
          autofocus
          autocomplete="username"
        />
        <base-icon-left icon="fas fa-at" />
        <base-icon-right v-if="errors.email" />
        <help-text
          v-if="errors.email"
          type="is-danger"
          :message="errors.email"
        />
      </div>
    </div>

    <div class="field is-flex is-justify-content-center">
      <div class="control">
        <base-button
          class="is-info"
          :class="{ 'is-loading': form.processing }"
          :disabled="form.processing"
        >
          Enviar Enlace de Restablecimiento
        </base-button>
      </div>
    </div>
  </form>
</template>

<script>
import TheGuestLayout from '@/Layouts/TheGuest'
import BaseButton from '@/Components/BaseButton'
import BaseHelpText from '@/Components/BaseHelpText'
import BaseIconLeft from '@/Components/BaseIconLeftInput'
import BaseIconRight from '@/Components/BaseIconRightInput'
import BaseInput from '@/Components/BaseInput'
import BaseNotificationValidation from '@/Components/BaseNotificationValidation'

export default {
  layout: TheGuestLayout,

  components: {
    BaseButton,
    BaseHelpText,
    BaseIconLeft,
    BaseIconRight,
    BaseInput,
    BreezeLabel,
    BaseNotificationValidation,
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
      this.form.post(this.route("password.email"));
    },
  },
}
</script>
