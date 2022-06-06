<template>
    <div>
        <Header/>
       <div>
        <form @submit.prevent="submitForm">
            <div class="form-group">
                <label for="title">Email</label>
                <input type="text" name="id" class="form-control" id="title" placeholder="Enter ID game" v-model="formFields.email">
            </div>

            <div class="form-group">
                <label for="title">Pass</label>
                <input type="password" name="id" class="form-control" id="title" placeholder="Enter ID game" v-model="formFields.pass">
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-success" />
            </div>
        </form>
       </div>
    </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import axios from 'axios';
import Header from '../components/Header.vue'

export default {
    components: {
        Link,
        Header,
        props: ["about_us"],
    },
    data(){
        return{
            formFields: {
                email: null,
                pass: null
            },
        }
    },
    methods: {
        onLogoChange(event){
            console.log(event.target.files)
            this.formFields.logo = event.target.files[0];
        },
        onCoverChange(event){
            console.log(event.target.files)
            this.formFields.cover = event.target.files[0];
        },
        submitForm(){
            let formData = new FormData();

            formData.append("password", this.formFields.pass);
            formData.append("email", this.formFields.email);

            axios.post('/login', formData)
                    .then((res) => {
                        console.log(res);
                    })
                    .catch((error) => {
                        console.log(error);
            });
        }
    },
};
</script>