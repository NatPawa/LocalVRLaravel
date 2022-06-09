<template>
    <div>
        <Header :page="'slider'" />
        <adminSlider></adminSlider>
    </div>
</template>

<script>
import axios from 'axios'
import Header from '../../components/HeaderAdmin.vue'
import adminSlider from '../../components/Slider/Show.vue'

export default {
    components: {
        Header,
        adminSlider
    }
}
</script>


<style scoped>

</style>