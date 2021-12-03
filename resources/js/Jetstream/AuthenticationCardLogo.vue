<template>
    <Link :href="'/'">
        <h1
            class="text-xl font-extrabold text-indigo-500  text-fredoka_one text-nunito_sans"
        >
            <i>Paymolt</i>
        </h1>
    </Link>
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
