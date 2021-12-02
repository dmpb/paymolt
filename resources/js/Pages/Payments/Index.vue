<template>
    <AppLayout title="Pagos">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Pagos
            </h2>
        </template>
        <div>
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <p>
                        En esta sección se muestra todos los pagos que se ha
                        procesado.
                    </p>
                    <Link
                        :href="route('payment-links.create')"
                        class="px-4 py-2 text-xs font-semibold text-white uppercase bg-blue-600 rounded-md "
                    >
                        Crear enlace de pago
                    </Link>
                </div>
            </div>
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-x-auto bg-white rounded-md">
                    <table class="min-w-full table-fixed whitespace-nowrap">
                        <thead>
                            <tr class="">
                                <th class="px-6 py-4">Estado</th>
                                <th class="px-6 py-4">Importe</th>
                                <th class="px-6 py-4 text-left">Descripción</th>
                                <th class="px-6 py-4 text-left">Cliente</th>
                                <th class="px-6 py-4 text-right">Fecha</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="payment in payments.data"
                                :key="payment.id"
                                class="hover:bg-gray-100"
                            >
                                <td class="border-t">
                                    <Link
                                        :href="
                                            route('payments.show', {
                                                payment: payment.id,
                                            })
                                        "
                                        class="flex items-center justify-center px-6 py-3 text-xs "
                                    >
                                        <span
                                            v-if="
                                                payment.status ===
                                                'venta_exitosa'
                                            "
                                            class="
                                                px-2
                                                py-0.5
                                                text-green-700
                                                font-bold
                                                bg-green-100
                                                rounded-md
                                            "
                                            >Exitoso
                                        </span>
                                        <span
                                            v-else
                                            class="
                                                px-2
                                                py-0.5
                                                font-bold
                                                text-red-700
                                                bg-red-100
                                                rounded-md
                                            "
                                        >
                                            Rechazada
                                        </span>
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link
                                        :href="
                                            route('payments.show', {
                                                payment: payment.id,
                                            })
                                        "
                                        class="flex items-center justify-end px-6 py-3 text-sm font-bold "
                                    >
                                        {{
                                            moneyFormat(
                                                "es-PE",
                                                payment.currency,
                                                payment.amount
                                            )
                                        }}
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link
                                        :href="
                                            route('payments.show', {
                                                payment: payment.id,
                                            })
                                        "
                                        class="flex items-center px-6 py-3 text-sm "
                                        >{{ payment.description }}</Link
                                    >
                                </td>
                                <td class="border-t">
                                    <Link
                                        :href="
                                            route('payments.show', {
                                                payment: payment.id,
                                            })
                                        "
                                        class="flex items-center px-6 py-3 text-sm "
                                    >
                                        {{ payment.client.email }}
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link
                                        :href="
                                            route('payments.show', {
                                                payment: payment.id,
                                            })
                                        "
                                        class="flex items-center justify-end px-6 py-3 text-sm "
                                        >{{
                                            dateFormat(
                                                "es-PE",
                                                "America/Lima",
                                                payment.created_at
                                            )
                                        }}
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link
                                        :href="
                                            route('payments.show', {
                                                payment: payment.id,
                                            })
                                        "
                                        class="flex items-center justify-end px-6 py-3 text-sm text-gray-600 "
                                    >
                                        <i class="fas fa-angle-right"></i>
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div
                class="flex justify-end px-4 pb-6 mx-auto  max-w-7xl sm:px-6 lg:px-8"
            >
                <Pagination :links="payments.links" />
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
    props: {
        payments: {
            type: Object,
            required: true,
        },
    },
    components: {
        AppLayout,
        Pagination,
        Link,
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
