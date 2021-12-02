<template>
    <div>
        <Head title="Comprar" />

        <div class="relative bg-white bg-opacity-20">
            <div
                class="absolute items-center block max-w-4xl min-w-full min-h-screen mx-auto  md:flex"
            >
                <div class="grid w-full grid-cols-1 gap-4 my-4 md:grid-cols-2">
                    <!-- Section 1 -->
                    <div
                        class="flex flex-col justify-between max-w-md px-4 mx-auto "
                    >
                        <!-- Header -->
                        <div>
                            <div class="flex items-center mb-6">
                                <div
                                    class="flex items-center justify-center w-6 h-6 rounded-full shadow-md "
                                >
                                    <i
                                        class="text-xs text-gray-400  fas fa-store"
                                    ></i>
                                </div>
                                <div
                                    class="ml-2 text-sm font-bold text-gray-500"
                                >
                                    {{ seller.name }}
                                </div>
                                <p
                                    class="
                                        py-0.5
                                        px-2
                                        text-xs text-yellow-500
                                        bg-yellow-100
                                        rounded-md
                                        ml-3
                                        font-bold
                                    "
                                >
                                    Prueba
                                </p>
                            </div>
                            <p
                                class="text-3xl font-bold text-center  md:text-left"
                            >
                                {{
                                    moneyFormat(
                                        "es-PE",
                                        paymentLink.currency,
                                        paymentLink.amount
                                    )
                                }}
                            </p>
                            <p
                                class="mb-4 text-center text-gray-400  md:text-left"
                            >
                                {{ paymentLink.description }}
                            </p>
                        </div>
                        <!-- Footer -->
                        <div class="hidden md:flex">
                            <p class="pr-4 text-xs text-gray-400 border-r">
                                Powered by
                                <span class="font-bold">Paymolt</span>
                            </p>
                            <div class="flex pl-4">
                                <p class="mr-3 text-xs text-gray-400">
                                    Condiciones
                                </p>
                                <p class="text-xs text-gray-400">Privacidad</p>
                            </div>
                        </div>
                    </div>
                    <!-- Section 2 -->
                    <div class="max-w-md mx-auto md:mx-0">
                        <div class="grid grid-cols-1 gap-3 px-4 md:px-14">
                            <!-- Title -->
                            <h2 class="mb-4 text-lg font-bold">
                                Pago con tarjeta
                            </h2>
                            <div
                                v-if="$page.props.flash.success"
                                class="p-4 text-green-500 bg-green-50"
                            >
                                {{ $page.props.flash.success }}
                            </div>
                            <div
                                v-if="$page.props.flash.error"
                                class="p-4 text-red-500 bg-red-50"
                            >
                                {{ $page.props.flash.error }}
                            </div>

                            <!-- Email -->
                            <div>
                                <jet-label
                                    for="card[email]"
                                    value="Correo electrónico"
                                    class="mb-1 font-semibold"
                                />
                                <jet-input
                                    id="card[email]"
                                    type="text"
                                    class="block w-full"
                                    v-model="form.client.email"
                                />
                                <jet-input-error
                                    class="mt-2"
                                    :message="form.errors['client.email']"
                                />
                            </div>
                            <!-- Name -->
                            <div
                                v-if="paymentLink.policy_settings.name_required"
                            >
                                <jet-label
                                    for="name"
                                    value="Nombres"
                                    class="mb-1 font-semibold"
                                />
                                <jet-input
                                    id="name"
                                    type="text"
                                    class="block w-full"
                                    v-model="form.client.name"
                                />
                                <jet-input-error
                                    class="mt-2"
                                    :message="form.errors['client.name']"
                                />
                            </div>
                            <!-- Phone Number -->
                            <div
                                v-if="
                                    paymentLink.policy_settings
                                        .phone_number_required
                                "
                            >
                                <jet-label
                                    for="phone_number"
                                    value="Numero telefónico"
                                    class="mb-1 font-semibold"
                                />
                                <jet-input
                                    id="phone_number"
                                    type="text"
                                    class="block w-full"
                                    v-model="form.client.phone_number"
                                />
                                <jet-input-error
                                    class="mt-2"
                                    :message="
                                        form.errors['client.phone_number']
                                    "
                                />
                            </div>
                            <!-- Address -->
                            <div
                                v-if="
                                    paymentLink.policy_settings.address_required
                                "
                            >
                                <jet-label
                                    for="address"
                                    value="Dirección"
                                    class="mb-1 font-semibold"
                                />
                                <jet-input
                                    id="address"
                                    type="text"
                                    class="block w-full"
                                    v-model="form.client.address"
                                />
                                <jet-input-error
                                    class="mt-2"
                                    :message="form.errors['client.address']"
                                />
                            </div>
                            <!-- Card -->
                            <div>
                                <jet-label
                                    for="currency"
                                    value="Información de la tarjeta"
                                    class="mb-1 font-semibold"
                                />
                                <div class="grid grid-cols-3 gap-2">
                                    <jet-input
                                        id="card[number]"
                                        type="text"
                                        class="col-span-3"
                                        placeholder="1234 1234 1234 1234"
                                        v-model="form.card.number"
                                    />
                                    <jet-input
                                        id="card[exp_month]"
                                        type="text"
                                        class="col-span-1"
                                        placeholder="MM"
                                        v-model="form.card.month"
                                    />
                                    <jet-input
                                        id="card[exp_year]"
                                        type="text"
                                        class="col-span-1"
                                        placeholder="AA"
                                        v-model="form.card.year"
                                    />
                                    <jet-input
                                        id="card[cvv]"
                                        type="text"
                                        class="col-span-1"
                                        placeholder="CVC"
                                        v-model="form.card.cvc"
                                    />
                                </div>
                            </div>
                            <div class="mt-4">
                                <button
                                    @click="pay()"
                                    class="block w-full px-4 py-3 text-xs font-semibold text-white uppercase bg-blue-600 rounded-md  disabled:bg-blue-300"
                                    :disabled="disabled_form"
                                >
                                    Pagar
                                </button>
                            </div>
                            <div>
                                <p class="text-sm text-gray-400">
                                    Al hacer clic en pagar estará aceptando los
                                    terminos y condiciones.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Divider -->
            <div class="grid min-h-screen grid-cols-2">
                <div></div>
                <div class="flex items-center shadow-none md:shadow-lg"></div>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent, onMounted, reactive, ref } from "vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetLabel from "@/Jetstream/Label.vue";

export default defineComponent({
    props: {
        seller: {
            type: Object,
            required: true,
        },
        sellerPublicKey: {
            type: String,
            required: true,
        },
        paymentLink: {
            type: Object,
            required: true,
        },
    },
    components: {
        Link,
        Head,
        JetInput,
        JetInputError,
        JetLabel,
    },
    setup(props) {
        const form = useForm({
            token: null,
            card: {
                number: null,
                month: null,
                year: null,
                cvc: null,
            },
            client: {
                email: null,
                phone_number: null,
                address: null,
                name: null,
            },
        });

        const disabled_form = ref(false);
        const message_form = reactive({
            type: null,
            message: null,
        });

        const moneyFormat = (locale, currency, amount) => {
            return Intl.NumberFormat(locale, {
                style: "currency",
                currency: currency,
            }).format(amount);
        };

        const pay = () => {
            disabled_form.value = true;
            window.Culqi.createToken();
        };

        const culqi = () => {
            let culqi = window.Culqi;

            const successful = (culqi) => {
                let token = culqi.token.id;

                form.token = token;
                form.post(
                    route("payments.store", {
                        paymentLink: props.paymentLink.code,
                    }),
                    {
                        onSuccess: () => {
                            form.reset();
                        },
                    }
                );
            };

            const failed = (culqi) => {
                alert(culqi.token.user_message);
            };

            if (culqi.token) {
                if (culqi.token.id !== undefined) {
                    successful(culqi);
                } else {
                    failed(culqi);
                }
            } else {
                console.error(
                    "Hay algunos problemas con la pasarela de pagos. Por favor intentar nuevamente en unos minutos."
                );
            }

            disabled_form.value = false;
        };

        onMounted(() => {
            window.Culqi.publicKey = props.sellerPublicKey;
            window.Culqi.init();

            window.culqi = culqi;
        });

        return {
            form,
            pay,
            moneyFormat,
            disabled_form,
            message_form,
        };
    },
});
</script>
