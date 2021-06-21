<template>
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

    <div class="field">
      <label class="label" for="password">Contraseña</label>
      <div class="control has-icons-left has-icons-right">
        <app-input
          id="password"
          type="password"
          :class="{ 'is-danger': errors.password }"
          v-model="form.password"
          required
          autocomplete="new-password"
        />
        <app-icon-left icon="fas fa-lock" />
        <app-icon-right v-if="errors.password" />
        <app-help-text-danger
          v-if="errors.password"
          :message="errors.password"
        />
      </div>
    </div>

    <div class="field">
      <label class="label" for="password_confirmation">Confirme Contraseña</label>
      <div class="control has-icons-left has-icons-right">
        <app-input
          id="password_confirmation"
          type="password"
          :class="{ 'is-danger': errors.password_confirmation }"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
        />
        <app-icon-left icon="fas fa-lock" />
        <app-icon-right v-if="errors.password_confirmation" />
        <app-help-text-danger
          v-if="errors.password_confirmation"
          :message="errors.password_confirmation"
        />
      </div>
    </div>

    <div class="field is-flex is-justify-content-center">
      <div class="control">
        <app-button
          class="is-warning"
          :class="{ 'is-loading': form.processing }"
          :disabled="form.processing"
        >
          Restablecer Contraseña
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
    email: String,
    errors: Object,
    token: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        token: this.token,
        email: this.email,
        password: '',
        password_confirmation: '',
      }),
    }
  },

  methods: {
    submit() {
      this.form.post(this.route('password.update'), {
        onFinish: () => this.form.reset('password', 'password_confirmation'),
      })
    },
  },
}
</script>
