<template>
    <Head title="Bienvenido" />

    <div
        class="py-4 text-sm text-center text-gray-700 bg-yellow-100  text-poppins"
    >
        💣 Todos los datos son falsos
        <span class="text-xs text-white bg-yellow-500 py-0.5 px-2 rounded-full"
            >Modo Prueba</span
        >
    </div>
    <!-- Header -->
    <div class="relative bg-white">
        <div
            class="overflow-hidden  bg-gradient-to-r from-purple-500 via-purple-600 to-indigo-500"
        >
            <div>
                <!-- Nav -->
                <div
                    class="flex items-center justify-between max-w-6xl px-6 py-4 mx-auto "
                >
                    <h1
                        class="text-3xl font-extrabold text-white  text-fredoka_one text-nunito_sans"
                    >
                        <i>Paymolt</i>
                    </h1>
                    <div v-if="canLogin">
                        <Link
                            v-if="$page.props.user"
                            :href="route('dashboard')"
                            class="text-sm text-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="text-sm text-white"
                            >
                                Iniciar Sesión
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="ml-4 text-sm text-white"
                            >
                                Registrarse
                            </Link>
                        </template>
                    </div>
                </div>
                <!-- Header -->
                <div
                    class="relative block max-w-6xl px-6 mx-auto mt-16 md:flex"
                >
                    <div class="pb-12 md:w-1/2">
                        <div
                            class="text-4xl leading-tight text-white  text-nunito_sans"
                        >
                            <p class="font-extralight">
                                Genera enlaces para aceptar pagos con tarjeta.
                            </p>
                            <strong class="font-semibold text-poppins"
                                >Sin construir una página web</strong
                            >
                        </div>
                        <div class="max-w-md pr-2 mt-8 text-lg text-white">
                            <p>
                                Paymolt es un robusto aplicativo que
                                <span class="font-bold text-green-300"
                                    >genera enlaces de pago</span
                                >
                                para hacer efectivo tus cobros por internet con
                                cualquier tipo de tarjeta de débito o crédito.
                            </p>
                            <p class="pt-4 text-base">
                                Sirviendo desde diciembre 2021.
                            </p>
                        </div>
                    </div>

                    <div class="md:w-1/2 md:pl-12">
                        <img
                            src="images/dashboard-screenshot.png"
                            alt="dashboard screenshot"
                            class="w-full md:max-w-3xl md:absolute rounded-t-md"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative w-full overflow-hidden bg-gray-50">
        <div class="flex justify-center px-6 py-4 overflow-hidden">
            <i
                class="mr-10 text-3xl text-gray-400  md:mr-24 fab fa-cc-mastercard"
            ></i>
            <i class="mr-10 text-3xl text-gray-400 md:mr-24 fab fa-cc-visa"></i>
            <i
                class="mr-10 text-3xl text-gray-400 md:mr-24 fab fa-cc-discover"
            ></i>
            <i
                class="mr-10 text-3xl text-gray-400  md:mr-24 fab fa-cc-diners-club"
            ></i>
            <i class="text-3xl text-gray-400 fab fa-cc-amex"></i>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white sm:rounded-lg">
                <div class="p-6 sm:px-20">
                    <p class="mb-8 text-2xl font-bold">
                        ¡Bienvenido a su aplicación Paymolt!
                    </p>
                    <p><span class="font-bold">Hola</span> 👋</p>
                    <p class="text-gray-500">
                        Muchas gracias por participar en este proyecto. Este
                        proyecto solo es un proyecto de prueba, asi es que todos
                        los datos que se encuentra en ello son falsos.
                    </p>
                    <p class="mt-2 font-bold">¿Qué es Paymolt?</p>
                    <p class="text-gray-500">
                        Paymolt es un robusto aplicativo que genera enlaces de
                        pago para hacer efectivo tus cobros por internet con
                        cualquier tipo de tarjeta de debito o credito. Paymolt
                        soluciona el gran problema que tienen muchos vendedores
                        que quieren vender sus productos mediante tarjeta, pero
                        no tienen la herramienta para hacer ello. Paymolt genera
                        el formulario de pago y lo registra en tu cuenta de
                        Paymolt. Nosotros no tenemos acceso al dinero procesado.
                    </p>
                    <p class="mt-1.5 text-gray-500">
                        Culqi es la pasarela de pagos con la que nos ayudamos
                        para procesar el dinero, así es que, como primera
                        instancia, deberás crearte una cuenta en Culqi.
                    </p>
                    <div
                        class="flex p-4 mt-3 border-4 border-gray-300 border-dashed "
                    >
                        <div class="mr-3">
                            <i class="text-yellow-300 fas fa-lightbulb"></i>
                        </div>
                        <div>
                            <p class="text-gray-500">
                                Recuerda que este proyecto está en modo prueba,
                                así es que todos los datos son falsos. En pocas
                                palabras <i>diviértete</i>
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
                                La documentación de cómo usar Paymolt se
                                realizará próximamente.
                            </div>

                            <a href="/">
                                <div
                                    class="flex items-center mt-3 text-sm font-semibold text-indigo-700 "
                                >
                                    <div>Explore la documentación</div>

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
                                Mi nombre es Daniel Ponce. Yo soy desarrollador
                                de software. Me gusta dar soluciones a problemas
                                con la tecnología. Si deseas ver más proyectos
                                míos, puedes dar clic en el enlace de abajo.
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
    <!-- Footer -->
    <footer class="w-full px-3 py-4 mt-auto text-center bg-white">
        <p>Created with ❤️ by Daniel Ponce</p>
        <a
            href="https://github.com/dmpb"
            target="_blank"
            class="text-blue-600 hover:text-blue-400"
            >My Github</a
        >
    </footer>
</template>

<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
    components: {
        Head,
        Link,
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
});
</script>
