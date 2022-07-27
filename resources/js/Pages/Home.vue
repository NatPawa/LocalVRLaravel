<template>
    <Header :page="'home'"/>
    <Slider></Slider>
    <SelectCombat></SelectCombat>
</template>

<script>
import Slider from "../components/Slider/Slider.vue"
import Header from "../components/Header.vue"
import Socket from "../components/Slider/SliderOnline.vue"
import SelectCombat from "../components/SelectCombat.vue"

export default {
    components: {
    Slider,
    SelectCombat,
    Header,
    Socket
},
    props: ["test"],
};
</script>