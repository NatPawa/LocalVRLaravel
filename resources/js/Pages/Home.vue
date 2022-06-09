<template>
    <Header :page="'home'"/>
    <Slider></Slider>
</template>

<script>
import Slider from "../components/Slider/Slider.vue"
import Header from "../components/Header.vue"
import Socket from "../components/Slider/SliderOnline.vue"

export default {
    components: {
    Slider,
    Header,
    Socket
},
    props: ["test"],
};
</script>