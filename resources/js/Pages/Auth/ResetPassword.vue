<template>
  <breeze-validation-errors />

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
          autocomplete="new-password"
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
      <breeze-label for="password_confirmation" value="Confirme Contraseña" />
      <div class="control has-icons-left has-icons-right">
        <breeze-input
          id="password_confirmation"
          type="password"
          class="is-rounded"
          :class="{ 'is-danger': errors.password_confirmation }"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
        />
        <input-icon-left icon="fas fa-lock" />
        <input-icon-right v-if="errors.password_confirmation" />
        <help-text
          v-if="errors.password_confirmation"
          type="is-danger"
          :message="errors.password_confirmation"
        />
      </div>
    </div>

    <div class="field is-flex is-justify-content-center">
      <div class="control">
        <breeze-button
          class="is-warning"
          :class="{ 'is-loading': form.processing }"
          :disabled="form.processing"
        >
          Restablecer Contraseña
        </breeze-button>
      </div>
    </div>
  </form>
</template>

<script>
import BreezeButton from "@/Components/Button";
import BreezeGuestLayout from "@/Layouts/Guest";
import BreezeInput from "@/Components/Input";
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
    BreezeLabel,
    BreezeValidationErrors,
    InputIconLeft,
    InputIconRight,
    HelpText,
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
        password: "",
        password_confirmation: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("password.update"), {
        onFinish: () => this.form.reset("password", "password_confirmation"),
      });
    },
  },
};
</script>
