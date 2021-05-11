<template>
  <breeze-validation-errors />

  <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
    {{ status }}
  </div>

  <form @submit.prevent="submit" novalidate>
    <div class="field">
      <breeze-label for="email" value="Correo Electrónico" />
      <div class="control has-icons-left has-icons-right">
        <breeze-input
          id="email"
          type="email"
          class="is-rounded"
          :class="{ 'is-danger': errors.email }"
          v-model="form.email"
          required
          autofocus
          autocomplete="username"
        />
        <input-icon-left icon="fas fa-at" />
        <input-icon-right v-if="errors.email" />
        <help-text
          v-if="errors.email"
          type="is-danger"
          :message="errors.email"
        />
      </div>
    </div>

    <div class="field">
      <breeze-label for="password" value="Contraseña" />
      <div class="control has-icons-left has-icons-right">
        <breeze-input
          id="password"
          type="password"
          class="is-rounded"
          :class="{ 'is-danger': errors.password }"
          v-model="form.password"
          required
          autocomplete="current-password"
        />
        <input-icon-left icon="fas fa-lock" />
        <input-icon-right v-if="errors.password" />
        <help-text
          v-if="errors.password"
          type="is-danger"
          :message="errors.password"
        />
      </div>
    </div>

    <div class="field">
      <label class="checkbox">
        <breeze-checkbox
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
        <breeze-button
          class="is-primary"
          :class="{ 'is-loading': form.processing }"
          :disabled="form.processing"
        >
          Iniciar Sesión
        </breeze-button>
      </div>
    </div>
  </form>
</template>

<script>
import BreezeButton from "@/Components/Button";
import BreezeGuestLayout from "@/Layouts/Guest";
import BreezeInput from "@/Components/Input";
import BreezeCheckbox from "@/Components/Checkbox";
import BreezeLabel from "@/Components/Label";
import BreezeValidationErrors from "@/Components/ValidationErrors";
import InputIconLeft from "@/Components/InputIconLeft.vue";
import InputIconRight from "@/Components/InputIconRight.vue";
import HelpText from "@/Components/HelpText.vue";

export default {
  layout: BreezeGuestLayout,

  components: {
    BreezeButton,
    BreezeInput,
    BreezeCheckbox,
    BreezeLabel,
    BreezeValidationErrors,
    InputIconLeft,
    InputIconRight,
    HelpText,
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
};
</script>
