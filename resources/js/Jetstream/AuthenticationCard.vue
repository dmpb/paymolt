<template>
    <div class="relative min-h-screen bg-gray-50">
        <div class="mx-auto sm:max-w-md">
            <div class="px-6 py-6 sm:px-0">
                <slot name="logo" />
            </div>

            <div class="py-10 bg-white shadow-lg px-14 sm:rounded-lg">
                <h2
                    class="pb-4 text-2xl font-bold text-gray-700  text-nunito_sans"
                >
                    <slot name="title"></slot>
                </h2>
                <slot />
            </div>
            <slot name="footer" />
        </div>
        <!-- Footer -->
        <footer
            class="absolute bottom-0 w-full px-3 py-4 mt-auto text-sm text-center bg-white "
        >
            <p>Created with ❤️ by Daniel Ponce</p>
            <a
                href="https://github.com/dmpb"
                target="_blank"
                class="text-blue-600 hover:text-blue-400"
                >My Github</a
            >
        </footer>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
    components: {
        Link,
    },
});
</script>
