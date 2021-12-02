<template>
    <AppLayout title="Pagos">
        <template #header>
            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Pagos
                </h2>
                <span class="text-xs text-gray-500 md:text-base">{{
                    payment.charge_culqi_id
                }}</span>
            </div>
        </template>
        <div>
            <div class="max-w-5xl px-4 py-6 mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between px-2 py-4">
                    <div class="w-1/2 sm:w-3/5">
                        <div
                            class="flex inline-flex items-center justify-center"
                        >
                            <p class="mr-4 text-2xl font-bold">
                                {{
                                    moneyFormat(
                                        "es-PE",
                                        culqiSource.currency_code,
                                        culqiSource.amount / 100
                                    )
                                }}
                            </p>
                            <span
                                v-if="
                                    payment.status === 'venta_exitosa'
                                "
                                class="
                                    px-2
                                    py-0.5
                                    text-green-700
                                    font-bold
                                    bg-green-100
                                    rounded-md
                                    text-xs
                                "
                                >Exitoso
                            </span>
                            <span
                                v-else
                                class="
                                    px-2
                                    py-0.5
                                    text-red-700
                                    font-bold
                                    bg-red-100
                                    rounded-md
                                    text-xs
                                "
                            >
                                Rechazada
                            </span>
                        </div>
                        <p class="text-sm text-gray-500">
                            {{
                                dateFormat(
                                    "es-PE",
                                    "America/Lima",
                                    payment.created_at
                                )
                            }}
                        </p>
                    </div>
                    <div class="w-1/2 pl-6 sm:w-2/5">
                        <p class="text-sm">
                            {{ payment.description }}
                        </p>
                    </div>
                </div>
                <div class="px-4 py-4 mb-6 bg-white rounded-md">
                    <h2 class="pb-1 text-lg font-bold border-b">Cliente</h2>
                    <div
                        class="grid grid-cols-1 gap-2 pt-4 md:gap-4 md:grid-cols-2"
                    >
                        <div class="grid grid-cols-3 gap-2 md:grid-cols-7">
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                Nombre:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ payment.client.name }}
                            </div>
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                Email:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ payment.client.email }}
                            </div>
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                Dirección:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ payment.client.address }}
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2 md:grid-cols-7">
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                Teléfono:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ payment.client.phone_number }}
                            </div>
                        </div>
                    </div>
                    <h2 class="pb-1 text-lg font-bold border-b mt-7">
                        Tarjeta
                    </h2>
                    <div
                        class="grid grid-cols-1 gap-2 pt-4 md:gap-4 md:grid-cols-2"
                    >
                        <div class="grid grid-cols-3 gap-2 md:grid-cols-7">
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                Número:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ culqiSource.source.card_number }}
                            </div>
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                Marca:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ culqiSource.source.iin.card_brand }}
                            </div>
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                Tipo:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ culqiSource.source.iin.card_type }}
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2 md:grid-cols-7">
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                Nombre:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ culqiSource.source.iin.issuer.name }}
                            </div>
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                Origen:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ culqiSource.source.iin.issuer.country }}
                            </div>
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                Teléfono:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ culqiSource.source.iin.issuer.phone_number }}
                            </div>
                        </div>
                    </div>
                    <h2 class="pb-1 text-lg font-bold border-b mt-7">
                        Navegador
                    </h2>
                    <div
                        class="grid grid-cols-1 gap-2 pt-4 md:gap-4 md:grid-cols-2"
                    >
                        <div class="grid grid-cols-3 gap-2 md:grid-cols-7">
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                IP:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ culqiSource.source.client.ip }}
                            </div>
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                Origen:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ culqiSource.source.client.ip_country }}
                            </div>
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                Código:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ culqiSource.source.client.ip_country_code }}
                            </div>
                        </div>
                        <div
                            class="grid grid-cols-3 grid-rows-3 gap-2 md:grid-cols-7"
                        >
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                Navegador:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ culqiSource.source.client.browser }}
                            </div>
                            <div class="col-span-1 text-gray-500 md:col-span-2">
                                Dispositivo:
                            </div>
                            <div class="col-span-2 md:col-span-5">
                                {{ culqiSource.source.client.device_type }}
                            </div>
                        </div>
                    </div>
                    <h2 class="pb-1 text-lg font-bold border-b mt-7">
                        Respuesta
                    </h2>
                    <p class="pt-5">
                        {{ culqiSource.outcome !== null ? culqiSource.outcome.merchant_message : 'Sin respuesta' }}
                    </p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
    props: {
        payment: {
            type: Object,
            required: true,
        },
        culqiSource: {
            type: Object,
            required: true,
        },
    },
    components: {
        Link,
        AppLayout,
    },
    setup() {
        const moneyFormat = (locale, currency, amount) => {
            return Intl.NumberFormat(locale, {
                style: "currency",
                currency: currency,
            }).format(amount);
        };

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

        return {
            moneyFormat,
            dateFormat,
        };
    },
});
</script>
