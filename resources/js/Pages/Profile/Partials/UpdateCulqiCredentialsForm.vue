<template>
    <jet-form-section @submitted="submit()">
        <template #title>Credenciales de Culqi</template>

        <template #description> Actualiza las API KEYS de tu cuenta.</template>

        <template #form>
            <!-- Public Key Development -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Llave pública" />
                <jet-input
                    id="public_key_development"
                    type="text"
                    class="block w-full mt-1"
                    v-model="form.public_key_development"
                    autocomplete="name"
                />
                <jet-input-error
                    :message="form.errors.public_key_development"
                    class="mt-2"
                />
            </div>
            <!-- Private Key Development -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Llave privada" />
                <jet-input
                    id="private_key_development"
                    type="text"
                    class="block w-full mt-1"
                    v-model="form.private_key_development"
                    autocomplete="name"
                />
                <jet-input-error
                    :message="form.errors.private_key_development"
                    class="mt-2"
                />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Guardado.
            </jet-action-message>

            <jet-button
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Guardar
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
import { defineComponent } from "vue";
import JetButton from "@/Jetstream/Button.vue";
import JetFormSection from "@/Jetstream/FormSection.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetActionMessage from "@/Jetstream/ActionMessage.vue";
import JetSecondaryButton from "@/Jetstream/SecondaryButton.vue";
import { useForm } from "@inertiajs/inertia-vue3";

export default defineComponent({
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetSecondaryButton,
    },

    props: ["user"],
    setup() {
        const form = useForm({
            public_key_development: null,
            private_key_development: null,
        });

        const submit = () => {
            form.post(route("culqi-development-credentials.update"), {
                onSuccess: () => form.reset(),
            });
        };

        return { form, submit };
    },
});
</script>
