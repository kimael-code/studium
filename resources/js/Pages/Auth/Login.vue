<template>
  <base-notification-validation />

  <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
    {{ status }}
  </div>

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
        <base-help-text
          v-if="errors.email"
          type="is-danger"
          :message="errors.email"
        />
      </div>
    </div>

    <div class="field">
      <label class="label" for="password">Contraseña</label>
      <div class="control has-icons-left has-icons-right">
        <base-input
          id="password"
          type="password"
          class="is-rounded"
          :class="{ 'is-danger': errors.password }"
          v-model="form.password"
          required
          autocomplete="current-password"
        />
        <base-icon-left icon="fas fa-lock" />
        <base-icon-right v-if="errors.password" />
        <base-help-text
          v-if="errors.password"
          type="is-danger"
          :message="errors.password"
        />
      </div>
    </div>

    <div class="field">
      <label class="checkbox">
        <base-checkbox
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
        <base-button
          class="is-primary"
          :class="{ 'is-loading': form.processing }"
          :disabled="form.processing"
        >
          Iniciar Sesión
        </base-button>
      </div>
    </div>
  </form>
</template>

<script>
import TheGuestLayout from '@/Layouts/TheGuest'
import BaseButton from '@/Components/BaseButton'
import BaseCheckbox from '@/Components/BaseCheckbox'
import BaseHelpText from '@/Components/BaseHelpText'
import BaseIconLeft from '@/Components/BaseIconLeftInput'
import BaseIconRight from '@/Components/BaseIconRightInput'
import BaseInput from '@/Components/BaseInput'
import BaseNotificationValidation from '@/Components/BaseNotificationValidation'

export default {
  layout: TheGuestLayout,

  components: {
    BaseButton,
    BaseCheckbox,
    BaseHelpText,
    BaseIconLeft,
    BaseIconRight,
    BaseInput,
    BaseNotificationValidation,
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
        email: "",
        password: "",
        remember: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("login"), {
          onFinish: () => this.form.reset("password"),
        });
    },
  },
}
</script>
