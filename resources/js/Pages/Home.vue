<template>
    <Header/>
    <Slider></Slider>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Slider from "../components/Slider.vue";
import Header from "../components/Header.vue"
export default {
    components: {
    Link,
    Slider,
    Header
},
    props: ["test"],
};
</script>