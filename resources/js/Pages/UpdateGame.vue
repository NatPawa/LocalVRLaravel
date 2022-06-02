<template>
    <div>
        <h1>inertiajs is {{ about_us }}</h1>

        <Link href="/">Go to Home</Link>

       <div>
        <form @submit.prevent="submitForm">
            <div class="form-group">
                <label for="title">Game ID</label>
                <input type="text" name="id" class="form-control" id="title" placeholder="Enter ID game" v-model="formFields.id">
            </div>

            <div class="form-group">
                <label for="description">Logo</label>
                <input type="file" name="logo" class="form-control-file" id="logo" @change="onLogoChange">
            </div>

            <div class="form-group">
                <label for="description">Cover</label>
                <input type="file" name="cover" class="form-control-file" id="cover" @change="onCoverChange">
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

export default {
    components: {
        Link,
        props: ["about_us"],
    },
    data(){
        return{
            formFields: {
                id: null,
                logo: null,
                cover: null
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

            formData.append("logo", this.formFields.logo);
            formData.append("cover", this.formFields.cover);
            formData.append("id", this.formFields.id);

            axios.post('/game/', formData)
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