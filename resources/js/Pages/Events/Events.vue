<template>
    <div>
        <Header :page="'events'" />
        
    </div>
</template>

<script>
import axios from 'axios'
import Header from '../../components/HeaderAdmin.vue'

export default {
    components: {
        Header
    }
}
</script>


<style scoped>

</style>