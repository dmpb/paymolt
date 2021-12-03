<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20">
                        <p class="mb-8 text-2xl font-bold">
                            ¡Bienvenido a su aplicación Paymolt!
                        </p>
                        <p><span class="font-bold">Hola</span> 👋</p>
                        <p class="text-gray-500">
                            Muchas gracias por participar en este proyecto. Este
                            proyecto solo es un proyecto de prueba, asi es que
                            todos los datos que se encuentra en ello son falsos.
                        </p>
                        <p class="mt-2 font-bold">¿Qué es Paymolt?</p>
                        <p class="text-gray-500">
                            Paymolt es un robusto aplicativo que genera enlaces
                            de pago con tarjeta de débito o crédito para tus
                            clientes. Paymolt soluciona el gran problema que
                            tienen muchos vendedores que quieren vender sus
                            productos mediante tarjeta, pero no tienen la
                            herramienta para hacer ello. Paymolt genera el
                            formulario de pago y lo registra en tu cuenta de
                            Paymolt. Nosotros no tenemos acceso al dinero
                            procesado.
                        </p>
                        <p class="mt-1.5 text-gray-500">
                            Culqi es la pasarela de pagos con la que nos
                            ayudamos para procesar el dinero, así es que, como
                            primera instancia, deberás crearte una cuenta en
                            Culqi.
                        </p>
                        <div
                            class="flex p-4 mt-3 border-4 border-gray-300 border-dashed "
                        >
                            <div class="mr-3">
                                <i class="text-yellow-300 fas fa-lightbulb"></i>
                            </div>
                            <div>
                                <p class="text-gray-500">
                                    Recuerda que este proyecto está en modo
                                    prueba, así es que todos los datos son
                                    falsos. En pocas palabras <i>diviértete</i>
                                    explorando Paymolt.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="grid grid-cols-1 bg-gray-200 bg-opacity-25  md:grid-cols-2"
                    >
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                    class="w-8 h-8 text-gray-400"
                                >
                                    <path
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                    ></path>
                                </svg>
                                <div
                                    class="ml-4 text-lg font-semibold leading-7 text-gray-600 "
                                >
                                    <p>Documentation</p>
                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-sm text-gray-500">
                                    La doucumentación de como usar Paymolt se
                                    realizará proximamente.
                                </div>

                                <a href="/">
                                    <div
                                        class="flex items-center mt-3 text-sm font-semibold text-indigo-700 "
                                    >
                                        <div>Explore la doucumentación</div>

                                        <div class="ml-1 text-indigo-500">
                                            <svg
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                                class="w-4 h-4"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div
                            class="p-6 border-t border-gray-200  md:border-t-0 md:border-l"
                        >
                            <div class="flex items-center">
                                <i
                                    class="w-8 h-8 text-3xl text-gray-400  fab fa-github-alt"
                                ></i>
                                <div
                                    class="ml-4 text-lg font-semibold leading-7 text-gray-600 "
                                >
                                    <a href="https://github.com/dmpb"
                                        >Sobre el creador</a
                                    >
                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-sm text-gray-500">
                                    Mi nombre es Daniel Ponce. Yo soy
                                    desarrollador de software. Me gusta dar
                                    soluciones a problemas con la tecnología. Si
                                    deseas ver mas proyectos, puedes dar clic en
                                    el enlace de abajo.
                                </div>

                                <a href="https://github.com/dmpb">
                                    <div
                                        class="flex items-center mt-3 text-sm font-semibold text-indigo-700 "
                                    >
                                        <div>Visita mi cuenta de GitHub</div>

                                        <div class="ml-1 text-indigo-500">
                                            <svg
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                                class="w-4 h-4"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";

export default defineComponent({
    props: {
        user: {
            type: Object,
        },
    },
    components: {
        AppLayout,
        Welcome,
    },
});
</script>
