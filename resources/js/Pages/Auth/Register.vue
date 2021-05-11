<template>
    <breeze-validation-errors />

    <form @submit.prevent="submit" novalidate>
        <div class="field">
            <breeze-label for="name" value="Nombres" />
            <div class="control has-icons-left has-icons-right">
                <breeze-input id="name" type="text" class="is-rounded" :class="{ 'is-danger': errors.name } " v-model="form.name" required autofocus autocomplete="name" />
                <input-icon-left icon="fas fa-user" />
                <input-icon-right v-if="errors.name" />
                <help-text v-if="errors.name" type="is-danger" :message="errors.name" />
            </div>
        </div>

        <div class="field">
            <breeze-label for="email" value="Correo Electrónico" />
            <div class="control has-icons-left has-icons-right">
                <breeze-input id="email" type="email" class="is-rounded" :class="{ 'is-danger': errors.email }" v-model="form.email" required autocomplete="username" />
                <input-icon-left icon="fas fa-at" />
                <input-icon-right v-if="errors.email" />
                <help-text v-if="errors.email" type="is-danger" :message="errors.email" />
            </div>
        </div>

        <div class="field">
            <breeze-label for="password" value="Contraseña" />
            <div class="control has-icons-left has-icons-right">
                <breeze-input id="password" type="password" class="is-rounded" :class="{ 'is-danger': errors.password }" v-model="form.password" required autocomplete="new-password" />
                <input-icon-left icon="fas fa-lock" />
                <input-icon-right v-if="errors.password" />
                <help-text v-if="errors.password" type="is-danger" :message="errors.password" />
            </div>
        </div>

        <div class="field">
            <breeze-label for="password_confirmation" value="Confirme Contraseña" />
            <div class="control has-icons-left has-icons-right">
                <breeze-input id="password_confirmation" type="password" class="is-rounded" :class="{ 'is-danger': errors.password_confirmation }" v-model="form.password_confirmation" required autocomplete="new-password" />
                <input-icon-left icon="fas fa-lock" />
                <input-icon-right v-if="errors.password_confirmation" />
                <help-text v-if="errors.password_confirmation" type="is-danger" :message="errors.password_confirmation" />
            </div>
        </div>

        <div class="is-flex is-justify-content-flex-end mb-4">
            <inertia-link :href="route('login')">
                ¿Ya está registrado?
            </inertia-link>
        </div>

        <div class="field">
            <div class="control">
            <breeze-button class="is-primary" :class="{ 'is-loading': form.processing }" :disabled="form.processing">
                Resistrar
            </breeze-button>
            </div>
        </div>
    </form>
</template>

<script>
    import BreezeButton from '@/Components/Button'
    import BreezeGuestLayout from '@/Layouts/Guest'
    import BreezeInput from '@/Components/Input'
    import BreezeLabel from '@/Components/Label'
    import BreezeValidationErrors from '@/Components/ValidationErrors'
    import InputIconLeft from '@/Components/InputIconLeft.vue'
    import InputIconRight from '@/Components/InputIconRight.vue'
    import HelpText from '@/Components/HelpText.vue'

    export default {
        layout: BreezeGuestLayout,

        components: {
            BreezeButton,
            BreezeInput,
            BreezeLabel,
            BreezeValidationErrors,
            InputIconLeft,
            InputIconRight,
            HelpText
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
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
