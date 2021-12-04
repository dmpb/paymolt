<template>
    <Head title="Log in" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <template #title> Inicia sesión en tu cuenta </template>

        <jet-validation-errors class="mb-4" />

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <jet-label
                    for="email"
                    class="font-bold"
                    value="Correo electrónico"
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
                    class="font-bold"
                    value="Contraseña"
                />
                <jet-input
                    id="password"
                    type="password"
                    class="block w-full mt-1"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox
                        name="remember"
                        v-model:checked="form.remember"
                    />
                    <span class="ml-2 text-sm font-bold text-gray-600"
                        >Recuérdame</span
                    >
                </label>
            </div>
            <div class="grid grid-cols-1 gap-2 mt-4">
                <button
                    type="submit"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    class="inline-flex items-center justify-center px-4 py-3 text-xs font-semibold tracking-widest text-white uppercase transition bg-indigo-500 border border-transparent rounded-md  hover:bg-indigo-400 active:bg--900 focus:outline-none focus:ring focus:ring-indigo-300 disabled:opacity-25"
                >
                    Iniciar sesión
                </button>
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="text-sm font-bold text-center text-indigo-500  hover:text-gray-900"
                >
                    ¿Olvidaste tu contraseña?
                </Link>
            </div>
        </form>
        <template #footer>
            <div class="px-4 py-8">
                <p class="text-sm text-gray-500">
                    ¿No tienes una cuenta?
                    <Link :href="route('register')" class="text-indigo-500"
                        >Crea tu cuenta</Link
                    >
                </p>
            </div>
        </template>
    </jet-authentication-card>
</template>

<script>
import { defineComponent } from "vue";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors,
        Link,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "dmpb@example.com",
                password: "password",
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
});
</script>
