<template>
  <article class="message">
    <div class="message-header">
      <p>Entrando a zona de seguridad</p>
      <button class="delete" aria-label="delete"></button>
    </div>
    <div class="message-body">
      Por favor, confirme su Contraseña antes de continuar.
    </div>
  </article>

  <base-notification-validation />

  <form @submit.prevent="submit" novalidate>
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
          autofocus
          autocomplete="current-password"
        />
        <base-icon-left icon="fas fa-lock" />
        <base-icon-right v-if="errors.password" />
        <help-text
          v-if="errors.password"
          type="is-danger"
          :message="errors.password"
        />
      </div>
    </div>

    <div class="field is-flex is-justify-content-end">
      <div class="control">
        <base-button
          class="is-primary"
          :class="{ 'is-loading': form.processing }"
          :disabled="form.processing"
        >
          Confirmar
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
    BaseNotificationValidation,
  },

  props: {
    auth: Object,
    errors: Object,
  },

  data() {
    return {
      form: this.$inertia.form({
        password: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("password.confirm"), {
        onFinish: () => this.form.reset(),
      });
    },
  },
};
</script>
