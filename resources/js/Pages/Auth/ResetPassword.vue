<template>
    <Head title="Reset Password" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <jet-label
                    for="email"
                    value="Correo electrónico"
                    class="font-bold"
                />
                <jet-input
                    id="email"
                    type="email"
                    class="block w-full mt-1"
                    v-model="form.email"
                    required
                    autofocus
                />
            </div>

            <div class="mt-4">
                <jet-label
                    for="password"
                    value="Contraseña"
                    class="font-bold"
                />
                <jet-input
                    id="password"
                    type="password"
                    class="block w-full mt-1"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4">
                <jet-label
                    for="password_confirmation"
                    value="Confirmar contraseña"
                    class="font-bold"
                />
                <jet-input
                    id="password_confirmation"
                    type="password"
                    class="block w-full mt-1"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button
                    type="submit"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    class="inline-flex items-center justify-center px-4 py-3 text-xs font-semibold tracking-widest text-white uppercase transition bg-indigo-500 border border-transparent rounded-md  hover:bg-indigo-400 active:bg--900 focus:outline-none focus:ring focus:ring-indigo-300 disabled:opacity-25"
                >
                    Reestablecer contraseña
                </button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
import { defineComponent } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";

export default defineComponent({
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetLabel,
        JetValidationErrors,
    },

    props: {
        email: String,
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
                onFinish: () =>
                    this.form.reset("password", "password_confirmation"),
            });
        },
    },
});
</script>
