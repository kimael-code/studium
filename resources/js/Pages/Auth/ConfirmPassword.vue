<template>
  <app-confirm-password-message />

  <app-notification-validation />

  <form @submit.prevent="submit" novalidate>
    <div class="field">
      <label class="label" for="password">Contraseña</label>
      <div class="control has-icons-left has-icons-right">
        <app-input
          id="password"
          type="password"
          :class="{ 'is-danger': errors.password }"
          v-model="form.password"
          required
          autofocus
          autocomplete="current-password"
        />
        <app-icon-left icon="fas fa-lock" />
        <app-icon-right v-if="errors.password" />
        <app-help-text-danger
          v-if="errors.password"
          :message="errors.password"
        />
      </div>
    </div>

    <div class="field is-flex is-justify-content-end">
      <div class="control">
        <app-button
          class="is-primary"
          :class="{ 'is-loading': form.processing }"
          :disabled="form.processing"
        >
          Confirmar
        </app-button>
      </div>
    </div>
  </form>
</template>

<script>
import TheGuestLayout from '@/Layouts/TheGuest'
import AppButton from '@/Components/AppButton'
import AppConfirmPasswordMessage from '@/Components/AppConfirmPasswordMessage'
import AppHelpTextDanger from '@/Components/AppHelpTextDanger'
import AppIconLeft from '@/Components/AppIconLeft'
import AppIconRight from '@/Components/AppIconRight'
import AppInput from '@/Components/AppInput'
import AppNotificationValidation from '@/Components/AppNotificationValidation'

export default {
  layout: TheGuestLayout,

  components: {
    AppButton,
    AppConfirmPasswordMessage,
    AppHelpTextDanger,
    AppIconLeft,
    AppIconRight,
    AppInput,
    AppNotificationValidation,
  },

  props: {
    auth: Object,
    errors: Object,
  },

  data() {
    return {
      form: this.$inertia.form({
        password: '',
      }),
    }
  },

  methods: {
    submit() {
      this.form.post(this.route('password.confirm'), {
        onFinish: () => this.form.reset(),
      })
    },
  },
}
</script>
