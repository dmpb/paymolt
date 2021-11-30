<template>
    <AppLayout title="Pagos">
        <template #header>
            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Enlaces de pagos
                </h2>
            </div>
        </template>
        <div>
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="max-w-xl mx-auto mb-6"></div>
                <div class="max-w-xl mx-auto mb-6 bg-white rounded-md shadow">
                    <form
                        @submit.prevent="
                            form.post(route('payment-links.store'))
                        "
                    >
                        <div class="grid grid-cols-4 gap-4 p-4">
                            <div
                                class="col-span-4 p-2 text-gray-500 border border-gray-200 rounded-md "
                            >
                                <span>💡</span> Por momento solo se acepta el
                                tipo de moneda en soles. Este tipo de moneda
                                está por defecto.
                            </div>
                            <!-- Currency -->
                            <div class="col-span-1">
                                <jet-label for="currency" value="Moneda" />
                                <jet-input
                                    id="currency"
                                    type="text"
                                    class="block w-full mt-1"
                                    v-model="form.currency"
                                    disabled
                                />
                                <jet-input-error
                                    :message="form.errors.currency"
                                    class="mt-2"
                                />
                            </div>
                            <!-- Amount -->
                            <div class="col-span-3">
                                <jet-label for="amount" value="Monto" />
                                <jet-input
                                    id="amount"
                                    type="text"
                                    class="block w-full mt-1"
                                    v-model="form.amount"
                                />
                                <jet-input-error
                                    class="mt-2"
                                    :message="form.errors.amount"
                                />
                            </div>
                            <!-- Description -->
                            <div class="col-span-4">
                                <jet-label
                                    for="description"
                                    value="Descripción"
                                />
                                <jet-input
                                    id="description"
                                    type="text"
                                    class="block w-full mt-1"
                                    autocomplete="description"
                                    v-model="form.description"
                                />
                                <jet-input-error class="mt-2" />
                            </div>
                            <div class="col-span-4">
                                <p class="text-lg font-semibold border-b">
                                    Configuración del formulario
                                </p>
                                <p class="pt-1 text-sm text-gray-400">
                                    Las casillas marcadas son aquellos datos que
                                    se pedirá de forma obligatoria a tu cliente.
                                </p>
                            </div>
                            <!-- Name Required -->
                            <div class="col-span-3">
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        id="name_required"
                                        autocomplete=""
                                        class="text-blue-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        v-model="
                                            form.policy_settings.name_required
                                        "
                                    />
                                    <label for="name_required" class="ml-2"
                                        >Requerir nombres</label
                                    >
                                </div>
                                <jet-input-error class="mt-2" />
                            </div>
                            <!-- Email Required -->
                            <div class="col-span-3">
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        id="email_required"
                                        class="text-blue-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        v-model="
                                            form.policy_settings.email_required
                                        "
                                    />
                                    <label for="email_required" class="ml-2"
                                        >Requerir email</label
                                    >
                                </div>
                                <jet-input-error class="mt-2" />
                            </div>
                            <!-- Phone Number Required -->
                            <div class="col-span-3">
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        id="phone_number_required"
                                        class="text-blue-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        v-model="
                                            form.policy_settings
                                                .phone_number_required
                                        "
                                    />
                                    <label
                                        for="phone_number_required"
                                        class="ml-2"
                                        >Requerir número telefónico</label
                                    >
                                </div>
                                <jet-input-error class="mt-2" />
                            </div>
                            <!-- Address Required -->
                            <div class="col-span-3">
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        id="address_required"
                                        class="text-blue-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        v-model="
                                            form.policy_settings
                                                .address_required
                                        "
                                    />
                                    <label for="address_required" class="ml-2"
                                        >Requerir dirección</label
                                    >
                                </div>
                                <jet-input-error class="mt-2" />
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-end p-4 bg-gray-50 rounded-b-md"
                        >
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="px-4 py-2 text-xs font-semibold text-white uppercase bg-blue-600 rounded-md disabled:bg-blue-300"
                            >
                                Crear
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetLabel from "@/Jetstream/Label.vue";
import { useForm } from "@inertiajs/inertia-vue3";

export default defineComponent({
    props: {},
    components: {
        AppLayout,
        Link,
        JetInput,
        JetInputError,
        JetLabel,
    },
    setup() {
        const form = useForm({
            currency: "PEN",
            amount: null,
            description: null,
            policy_settings: {
                email_required: false,
                phone_number_required: false,
                address_required: false,
                name_required: false,
            },
        });

        const dateFormat = (locale, timezone, date) => {
            return new Date(date).toLocaleString(locale, {
                year: "numeric",
                month: "short",
                day: "numeric",
                hour: "numeric",
                minute: "numeric",
                timezone: timezone,
            });
        };

        return { form, dateFormat };
    },
});
</script>
