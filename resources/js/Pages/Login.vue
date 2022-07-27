<template>
<Header :page="'login'"/>
<div class="container mt-5 d-flex w-100 justify-content-center">
    <div class="w-100 ">
        <div class="w-100">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center flex-column">
                        <a href="/auth/github/redirect" class="m-4 display-6">LogIn Whit GitHub <i class="ml-2 fab fa-github"></i></a>
                        <a href="/auth/google/redirect" class="m-4 display-6">LogIn Whit Google <i class="ml-2 fab fa-google"></i></a>
                    </div>
                    <div class="d-flex align-items-center flex-column">
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{('Email Address') }}</label>

                            <div class="col-md-6">
                                <input v-model="this.fields.email" id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{('Password') }}</label>

                            <div class="col-md-6">
                                <input v-model="this.fields.password" id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input v-model="this.fields.remember" class="form-check-input" type="checkbox" name="remember" id="remember">

                                    <label class="form-check-label" for="remember">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button v-on:click="login" class="btn btn-primary">Log In</button>

                                    <a class="btn btn-link" href="#">Forgot Your Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

 

<script>
import axios from 'axios'
import Header from "../components/Header.vue"
import {Inertia} from "@inertiajs/inertia";
export default {
    components: {
        Header,
},
  data() {
    return {
      message : {},
      fields : {},
    }
  },
  methods:{
      async login() {
          try {
          await axios.post("/login",this.fields)
          .then((response)=>{
            console.log(response.data)
            Inertia.get("/")
          })
        } catch (err) {
          console.log(err)
        }
      }
  }
};

</script>