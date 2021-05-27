<template>
  <article class="message is-info">
    <div class="message-header">
      <p>¡Gracias por registrarse!</p>
    </div>
    <div class="message-body">
      Antes de comenzar, ¿podría verificar su dirección de correo electrónico
      haciendo clic en el enlace que le acabamos de enviar?
      <em>Si no recibió el correo electrónico, con gusto le enviaremos otro</em
      >.
    </div>
  </article>

  <div class="notification is-success" v-if="verificationLinkSent">
    Se ha enviado un nuevo enlace de verificación
    <strong
      >a la dirección de correo electrónico que proporcionó durante el
      registro</strong
    >.
  </div>

  <form @submit.prevent="submit">
    <div class="field is-grouped">
      <div class="control">
        <breeze-button
          class="is-primary"
          :class="{ 'is-loading': form.processing }"
          :disabled="form.processing"
        >
          Reenviar Enlace
        </breeze-button>
      </div>
      <div class="control">
        <inertia-link
          :href="route('logout')"
          method="post"
          as="button"
          class="button is-info is-light is-rounded"
          >Cerrar Sesión</inertia-link
        >
      </div>
    </div>
  </form>
</template>

<script>
import BreezeButton from "@/Components/Button";
import BreezeGuestLayout from "@/Layouts/Guest";

export default {
  layout: BreezeGuestLayout,

  components: {
    BreezeButton,
  },

  props: {
    auth: Object,
    errors: Object,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form(),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("verification.send"));
    },
  },

  computed: {
    verificationLinkSent() {
      return this.status === "verification-link-sent";
    },
  },
};
</script>
