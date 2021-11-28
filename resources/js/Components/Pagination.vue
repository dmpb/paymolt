<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, k) in links" :key="k">
                <div
                    v-if="link.url === null"
                    class="px-4 py-3 mb-1 mr-1 text-sm leading-4 text-gray-400 border rounded "
                    v-html="link.label"
                />
                <Link
                    v-else
                    class="px-4 py-3 mb-1 mr-1 text-sm leading-4 border rounded  hover:bg-blue-700 hover:text-white"
                    :class="{ 'bg-blue-700 text-white': link.active }"
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
    props: {
        links: {
            type: Array,
        },
    },
    components: {
        Link,
    },
});
</script>
