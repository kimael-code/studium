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

    <div class="field is-flex is-justify-content-center">
      <div class="control">
        <breeze-button
          class="is-info"
          :class="{ 'is-loading': form.processing }"
          :disabled="form.processing"
        >
          Enviar Enlace de Restablecimiento
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
    errors: Object,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("password.email"));
    },
  },
};
</script>
