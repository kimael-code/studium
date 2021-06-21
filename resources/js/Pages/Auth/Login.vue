<template>
  <app-notification-validation />

  <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
    {{ status }}
  </div>

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

    <div class="field">
      <label class="label" for="password">Contraseña</label>
      <div class="control has-icons-left has-icons-right">
        <app-input
          id="password"
          type="password"
          :class="{ 'is-danger': errors.password }"
          v-model="form.password"
          required
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

    <div class="field">
      <label class="checkbox">
        <app-checkbox
          text="Recuérdame"
          name="remember"
          v-model:checked="form.remember"
        />
        Recuérdame
      </label>
    </div>

    <div class="is-flex is-justify-content-flex-end mb-4">
      <inertia-link v-if="canResetPassword" :href="route('password.request')">
        ¿Olvidó su contraseña?
      </inertia-link>
    </div>

    <div class="field">
      <div class="control">
        <app-button
          class="is-primary"
          :class="{ 'is-loading': form.processing }"
          :disabled="form.processing"
        >
          Ingresar
        </app-button>
      </div>
    </div>
  </form>
</template>

<script>
import TheGuestLayout from '@/Layouts/TheGuest'
import AppButton from '@/Components/AppButton'
import AppCheckbox from '@/Components/AppCheckbox'
import AppHelpTextDanger from '@/Components/AppHelpTextDanger'
import AppIconLeft from '@/Components/AppIconLeft'
import AppIconRight from '@/Components/AppIconRight'
import AppInput from '@/Components/AppInput'
import AppNotificationValidation from '@/Components/AppNotificationValidation'

export default {
  layout: TheGuestLayout,

  components: {
    AppButton,
    AppCheckbox,
    AppHelpTextDanger,
    AppIconLeft,
    AppIconRight,
    AppInput,
    AppNotificationValidation,
  },

  props: {
    auth: Object,
    canResetPassword: Boolean,
    errors: Object,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: '',
        password: '',
        remember: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? 'on' : '',
        }))
        .post(this.route('login'), {
          onFinish: () => this.form.reset('password'),
        })
    },
  },
}
</script>
