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

  <breeze-validation-errors />

  <form @submit.prevent="submit" novalidate>
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
          autofocus
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

    <div class="field is-flex is-justify-content-end">
      <div class="control">
        <breeze-button
          class="is-primary"
          :class="{ 'is-loading': form.processing }"
          :disabled="form.processing"
        >
          Confirmar
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
