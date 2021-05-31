<template>
  <base-notification-validation />

  <form @submit.prevent="submit" novalidate>
    <div class="field">
      <label class="label" for="name">Nombres</label>
      <div class="control has-icons-left has-icons-right">
        <base-input
          id="name"
          type="text"
          class="is-rounded"
          :class="{ 'is-danger': errors.name }"
          v-model="form.name"
          required
          autofocus
          autocomplete="name"
        />
        <base-icon-left icon="fas fa-user" />
        <base-icon-right v-if="errors.name" />
        <help-text v-if="errors.name" type="is-danger" :message="errors.name" />
      </div>
    </div>

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
          autocomplete="new-password"
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

    <div class="field">
      <label class="label" for="password_confirmation"
        >Confirme Contraseña</label
      >
      <div class="control has-icons-left has-icons-right">
        <base-input
          id="password_confirmation"
          type="password"
          class="is-rounded"
          :class="{ 'is-danger': errors.password_confirmation }"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
        />
        <base-icon-left icon="fas fa-lock" />
        <base-icon-right v-if="errors.password_confirmation" />
        <help-text
          v-if="errors.password_confirmation"
          type="is-danger"
          :message="errors.password_confirmation"
        />
      </div>
    </div>

    <div class="is-flex is-justify-content-flex-end mb-4">
      <inertia-link :href="route('login')"> ¿Ya está registrado? </inertia-link>
    </div>

    <div class="field">
      <div class="control">
        <base-button
          class="is-primary"
          :class="{ 'is-loading': form.processing }"
          :disabled="form.processing"
        >
          Resistrar
        </base-button>
      </div>
    </div>
  </form>
</template>

<script>
import TheGuestLayout from "@/Layouts/TheGuest";
import BaseButton from "@/Components/BaseButton";
import BaseHelpText from "@/Components/BaseHelpText.vue";
import BaseIconLeft from "@/Components/BaseIconLeftInput";
import BaseIconRight from "@/Components/BaseIconRightInput";
import BaseInput from "@/Components/BaseInput";
import BaseNotificationValidation from "@/Components/BaseNotificationValidation";

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
