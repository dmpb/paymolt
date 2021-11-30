<template>
    <AppLayout title="Pagos">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Enlaces de pagos
            </h2>
        </template>
        <div>
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <p>
                        En esta sección se muestra todos los enlaces pagos que
                        ha generado.
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
                                <th class="px-6 py-4">Enlace</th>
                                <th class="px-6 py-4 text-right">Precio</th>
                                <th class="px-6 py-4 text-center">Estado</th>
                                <th class="px-6 py-4 text-right">
                                    Actualizado
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="paymentLink in paymentLinks.data"
                                :key="paymentLink.id"
                                class="hover:bg-gray-100"
                            >
                                <td class="border-t">
                                    <div
                                        class="flex items-center justify-start px-6 py-3 text-sm text-blue-900 "
                                    >
                                        htts://paymolt.com/buy/{{
                                            paymentLink.code
                                        }}
                                    </div>
                                </td>
                                <td class="border-t">
                                    <Link
                                        :href="
                                            route('payment-links.edit', {
                                                paymentLink: paymentLink.code,
                                            })
                                        "
                                        class="flex items-center justify-end px-6 py-3 text-sm font-bold "
                                    >
                                        {{
                                            moneyFormat(
                                                "es-PE",
                                                paymentLink.currency,
                                                paymentLink.amount
                                            )
                                        }}
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link
                                        :href="
                                            route('payment-links.edit', {
                                                paymentLink: paymentLink.code,
                                            })
                                        "
                                        class="flex items-center justify-center px-6 py-3 text-sm "
                                    >
                                        <span
                                            v-if="
                                                paymentLink.finished_at ==
                                                    null || paymentLink == ''
                                            "
                                            class="
                                                px-2
                                                py-0.5
                                                text-green-600
                                                font-bold
                                                rounded-md
                                            "
                                            >Activo</span
                                        >
                                        <span
                                            v-else
                                            class="
                                                px-2
                                                py-0.5
                                                font-bold
                                                text-red-600
                                                rounded-md
                                            "
                                            >Finalizado</span
                                        >
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link
                                        :href="
                                            route('payment-links.edit', {
                                                paymentLink: paymentLink.code,
                                            })
                                        "
                                        class="flex items-center justify-end px-6 py-3 text-sm "
                                    >
                                        {{
                                            dateFormat(
                                                "es-PE",
                                                "America/Lima",
                                                paymentLink.updated_at
                                            )
                                        }}
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link
                                        :href="
                                            route('payment-links.edit', {
                                                paymentLink: paymentLink.code,
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
                <Pagination :links="paymentLinks.links" />
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
        paymentLinks: {
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
