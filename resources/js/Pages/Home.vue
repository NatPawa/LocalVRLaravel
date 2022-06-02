<template>
    <h1 class="animate__animated animate__bounce text-sky-400/50">An animated element</h1>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        Link,
    },
    props: ["test"],
};
</script>