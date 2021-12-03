<template>
    <Head title="Register" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <template #title> Crea tu cuenta de Paymolt </template>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <jet-label for="name" value="Name" class="font-bold" />
                <jet-input
                    id="name"
                    type="text"
                    class="block w-full mt-1"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />
            </div>

            <div class="mt-4">
                <jet-label for="email" value="Email" class="font-bold" />
                <jet-input
                    id="email"
                    type="email"
                    class="block w-full mt-1"
                    v-model="form.email"
                    required
                />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password" class="font-bold" />
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
                    value="Confirm Password"
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

            <div
                class="mt-4"
                v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
            >
                <jet-label for="terms">
                    <div class="flex items-center">
                        <jet-checkbox
                            name="terms"
                            id="terms"
                            v-model:checked="form.terms"
                        />

                        <div class="ml-2">
                            I agree to the
                            <a
                                target="_blank"
                                :href="route('terms.show')"
                                class="text-sm text-gray-600 underline  hover:text-gray-900"
                                >Terms of Service</a
                            >
                            and
                            <a
                                target="_blank"
                                :href="route('policy.show')"
                                class="text-sm text-gray-600 underline  hover:text-gray-900"
                                >Privacy Policy</a
                            >
                        </div>
                    </div>
                </jet-label>
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
                    :href="route('login')"
                    class="text-sm font-bold text-center text-indigo-500  hover:text-gray-900"
                >
                    ¿Ya te encuentras registrado?
                </Link>
            </div>
        </form>
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

    data() {
        return {
            form: this.$inertia.form({
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                terms: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("register"), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation"),
            });
        },
    },
});
</script>
