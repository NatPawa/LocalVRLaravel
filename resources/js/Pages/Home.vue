<template>
    <Link></Link>
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