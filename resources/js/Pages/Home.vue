<template>
    <Header :page="'home'"/>
    <Slider></Slider>
</template>

<script>
import Slider from "../components/Slider.vue"
import Header from "../components/Header.vue"

export default {
    components: {
    Slider,
    Header
},
    props: ["test"],
};
</script>