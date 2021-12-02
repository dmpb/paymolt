<template>
    <jet-action-section>
        <template #title> Autenticación de dos factores </template>

        <template #description>
            Agregue seguridad adicional a su cuenta mediante la autenticación de
            dos factores.
        </template>

        <template #content>
            <h3
                class="text-lg font-medium text-gray-900"
                v-if="twoFactorEnabled"
            >
                Ha habilitado la autenticación de dos factores.
            </h3>

            <h3 class="text-lg font-medium text-gray-900" v-else>
                No ha habilitado la autenticación de dos factores.
            </h3>

            <div class="max-w-xl mt-3 text-sm text-gray-600">
                <p>
                    Cuando la autenticación de dos factores está habilitada, se
                    le pedirá un token aleatorio seguro durante la
                    autenticación. Puede recuperar este token de la aplicación
                    Autenticador de Google de su teléfono.
                </p>
            </div>

            <div v-if="twoFactorEnabled">
                <div v-if="qrCode">
                    <div class="max-w-xl mt-4 text-sm text-gray-600">
                        <p class="font-semibold">
                            La autenticación de dos factores ahora está
                            habilitada. Escanee el siguiente código QR
                            utilizando la aplicación de autenticación de su
                            teléfono.
                        </p>
                    </div>

                    <div class="mt-4" v-html="qrCode"></div>
                </div>

                <div v-if="recoveryCodes.length > 0">
                    <div class="max-w-xl mt-4 text-sm text-gray-600">
                        <p class="font-semibold">
                            Guarde estos códigos de recuperación en un
                            administrador de contraseñas seguro. Se pueden
                            utilizar para recuperar el acceso a su cuenta si
                            pierde su dispositivo de autenticación de dos
                            factores.
                        </p>
                    </div>

                    <div
                        class="grid max-w-xl gap-1 px-4 py-4 mt-4 font-mono text-sm bg-gray-100 rounded-lg "
                    >
                        <div v-for="code in recoveryCodes" :key="code">
                            {{ code }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div v-if="!twoFactorEnabled">
                    <jet-confirms-password
                        @confirmed="enableTwoFactorAuthentication"
                    >
                        <jet-button
                            type="button"
                            :class="{ 'opacity-25': enabling }"
                            :disabled="enabling"
                        >
                            Habilitar
                        </jet-button>
                    </jet-confirms-password>
                </div>

                <div v-else>
                    <jet-confirms-password @confirmed="regenerateRecoveryCodes">
                        <jet-secondary-button
                            class="mr-3"
                            v-if="recoveryCodes.length > 0"
                        >
                            Regenerar códigos de recuperación
                        </jet-secondary-button>
                    </jet-confirms-password>

                    <jet-confirms-password @confirmed="showRecoveryCodes">
                        <jet-secondary-button
                            class="mr-3"
                            v-if="recoveryCodes.length === 0"
                        >
                            Mostrar códigos de recuperación
                        </jet-secondary-button>
                    </jet-confirms-password>

                    <jet-confirms-password
                        @confirmed="disableTwoFactorAuthentication"
                    >
                        <jet-danger-button
                            :class="{ 'opacity-25': disabling }"
                            :disabled="disabling"
                        >
                            Desactivar
                        </jet-danger-button>
                    </jet-confirms-password>
                </div>
            </div>
        </template>
    </jet-action-section>
</template>

<script>
import { defineComponent } from "vue";
import JetActionSection from "@/Jetstream/ActionSection.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetConfirmsPassword from "@/Jetstream/ConfirmsPassword.vue";
import JetDangerButton from "@/Jetstream/DangerButton.vue";
import JetSecondaryButton from "@/Jetstream/SecondaryButton.vue";

export default defineComponent({
    components: {
        JetActionSection,
        JetButton,
        JetConfirmsPassword,
        JetDangerButton,
        JetSecondaryButton,
    },

    data() {
        return {
            enabling: false,
            disabling: false,

            qrCode: null,
            recoveryCodes: [],
        };
    },

    methods: {
        enableTwoFactorAuthentication() {
            this.enabling = true;

            this.$inertia.post(
                "/user/two-factor-authentication",
                {},
                {
                    preserveScroll: true,
                    onSuccess: () =>
                        Promise.all([
                            this.showQrCode(),
                            this.showRecoveryCodes(),
                        ]),
                    onFinish: () => (this.enabling = false),
                }
            );
        },

        showQrCode() {
            return axios.get("/user/two-factor-qr-code").then((response) => {
                this.qrCode = response.data.svg;
            });
        },

        showRecoveryCodes() {
            return axios
                .get("/user/two-factor-recovery-codes")
                .then((response) => {
                    this.recoveryCodes = response.data;
                });
        },

        regenerateRecoveryCodes() {
            axios.post("/user/two-factor-recovery-codes").then((response) => {
                this.showRecoveryCodes();
            });
        },

        disableTwoFactorAuthentication() {
            this.disabling = true;

            this.$inertia.delete("/user/two-factor-authentication", {
                preserveScroll: true,
                onSuccess: () => (this.disabling = false),
            });
        },
    },

    computed: {
        twoFactorEnabled() {
            return !this.enabling && this.$page.props.user.two_factor_enabled;
        },
    },
});
</script>
