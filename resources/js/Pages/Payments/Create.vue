<template>
    <div>
        <Head title="Comprar" />

        <div class="relative bg-white bg-opacity-20">
            <div
                class="absolute items-center block max-w-4xl min-w-full min-h-screen mx-auto  md:flex"
            >
                <div class="grid w-full grid-cols-1 gap-4 my-4 md:grid-cols-2">
                    <div
                        class="flex flex-col justify-between max-w-md px-4 mx-auto "
                    >
                        <div>
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
                                        class="ml-2 text-sm font-bold text-gray-500 "
                                    >
                                        Daniel Ponce
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
                                    S/. 120.00
                                </p>
                                <p
                                    class="mb-4 text-center text-gray-400  md:text-left"
                                >
                                    Descripcion del producto.
                                </p>
                            </div>
                        </div>
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
                    <div class="max-w-md mx-auto md:mx-0">
                        <div class="grid grid-cols-1 gap-3 px-4 md:px-14">
                            <h2 class="mb-4 text-lg font-bold">
                                Pago con tarjeta
                            </h2>
                            <div>
                                <jet-label
                                    for="currency"
                                    value="Moneda"
                                    class="mb-1 font-semibold"
                                />
                                <jet-input
                                    id="currency"
                                    type="text"
                                    class="block w-full"
                                />
                                <jet-input-error class="mt-2" />
                            </div>
                            <div>
                                <jet-label
                                    for="currency"
                                    value="Información de la tarjeta"
                                    class="mb-1 font-semibold"
                                />
                                <div class="grid grid-cols-3 gap-2">
                                    <jet-input
                                        id="currency"
                                        type="text"
                                        class="col-span-3"
                                    />
                                    <jet-input
                                        id="currency"
                                        type="text"
                                        class="col-span-1"
                                    />
                                    <jet-input
                                        id="currency"
                                        type="text"
                                        class="col-span-1"
                                    />
                                    <jet-input
                                        id="currency"
                                        type="text"
                                        class="col-span-1"
                                    />
                                </div>
                            </div>
                            <div>
                                <jet-label
                                    for="currency"
                                    value="Moneda"
                                    class="mb-1 font-semibold"
                                />
                                <jet-input
                                    id="currency"
                                    type="text"
                                    class="block w-full"
                                />
                                <jet-input-error class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <button
                                    class="block w-full px-4 py-3 text-xs font-semibold text-white uppercase bg-blue-600 rounded-md  disabled:bg-blue-300"
                                >
                                    Pagar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid min-h-screen grid-cols-2">
                <div></div>
                <div class="flex items-center shadow-none md:shadow-lg"></div>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetLabel from "@/Jetstream/Label.vue";

export default defineComponent({
    components: {
        Link,
        Head,
        JetInput,
        JetInputError,
        JetLabel,
    },
    setup() {},
});
</script>
