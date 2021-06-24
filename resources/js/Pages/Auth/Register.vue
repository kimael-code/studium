<template>
  <app-notification-validation />

  <form @submit.prevent="submit" novalidate>
    <div class="field">
      <label class="label" for="name">Nombres</label>
      <div class="control has-icons-left has-icons-right">
        <app-input
          id="name"
          type="text"
          :class="{ 'is-danger': errors.name }"
          v-model="form.name"
          required
          autofocus
          autocomplete="name"
        />
        <app-icon-left icon="fas fa-user" />
        <app-icon-right v-if="errors.name" />
        <help-text-danger
          v-if="errors.name"
          :message="errors.name"
        />
      </div>
    </div>

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
        <help-text-danger
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
        <help-text-danger
          v-if="errors.password"
          :message="errors.password"
        />
      </div>
    </div>

    <div class="field">
      <label class="label" for="password_confirmation"
        >Confirme Contraseña</label
      >
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
        <help-text-danger
          v-if="errors.password_confirmation"
          :message="errors.password_confirmation"
        />
      </div>
    </div>

    <div class="is-flex is-justify-content-flex-end mb-4">
      <inertia-link :href="route('login')"> ¿Ya está registrado? </inertia-link>
    </div>

    <div class="field">
      <div class="control">
        <app-button
          class="is-primary"
          :class="{ 'is-loading': form.processing }"
          :disabled="form.processing"
        >
          Resistrar
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
  },

  data() {
    return {
      form: this.$inertia.form({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        terms: false,
      }),
    }
  },

  methods: {
    submit() {
      this.form.post(this.route('register'), {
        onFinish: () => this.form.reset('password', 'password_confirmation'),
      })
    },
  },
}
</script>
