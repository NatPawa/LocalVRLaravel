<template>
    <Link></Link>
    <h2 class="text-slate-400 hover:text-sky-400">Ejemplo</h2>
    <Slider></Slider>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Slider from "../components/Slider.vue";
export default {
    components: {
    Link,
    Slider
},
    props: ["test"],
};
</script>