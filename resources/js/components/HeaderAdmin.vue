<template>
    <nav class="navbar navbar-light bg-light align-items-center p-3">
        
        <Link href="/" class="w-10">
            <img src="/ResourcesLocal/Logo/LogoLocalLletres.png" alt="" class="w-100">
        </Link>

        <div class="links"> 
                <Link v-if="userLog.role == 'admin' || userLog.role == 'editor' " href="/admin/slider" :class="this.page == 'slider' ? 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation selected': 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation'">Slider</Link>
                <Link v-if="userLog.role == 'admin'" href="/admin/users" :class="this.page == 'users' ? 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation selected': 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation'">Usuarios</Link>
                <Link v-if="userLog.role == 'admin'" href="/admin/events" :class="this.page == 'events' ? 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation selected': 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation'">Eventos</Link>
                <Link v-if="userLog.role == 'admin'" href="/admin/devices" :class="this.page == 'devices' ? 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation selected': 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation'">Equipos</Link>
                <Link v-if="userLog.role == 'admin'" href="/admin/games" :class="this.page == 'games' ? 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation selected': 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation'">Juegos</Link>
                <Link v-if="userLog.role == 'admin'" href="/admin/custom" :class="this.page == 'custom' ? 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation selected': 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation'">Custom</Link>
        </div>
        
        <div v-if="userLog !== null" class="user-image">
            <div class="navbar-brand d-flex align-items-center">
                <h4 class="mr-2 mb-0 text-primary header-text fs-5">{{user.name}}</h4>
                <div v-if="this.userLog.urlimage !== null" class="img-profile d-inline-block rounded-circle mr-1 d-flex align-content-center justify-content-center" :style="{ backgroundImage: 'url(' + this.userLog.urlimage + ')' }">
                    <p class="header-lvl text-light font-weight-normal align-self-center m-0">{{this.userLog.level}}</p>
                </div>
                <div v-else class="img-profile d-inline-block rounded-circle mr-1 d-flex align-content-center justify-content-center" style="backgroundImage: url(/ResourcesLocal/Default.png)">
                    <p class="header-lvl text-light font-weight-normal align-self-center m-0 ">{{this.userLog.level}}</p>
                </div>
                <a v-on:click="showOptions = !showOptions"><i :class="showOptions? 'fa-solid fa-caret-up text-primary header-text mt-2' : 'fa-solid fa-caret-down text-primary header-text' "></i></a>
            </div>
            
              <div v-if="showOptions" class="w-100 justify-content-end d-flex">
                <div class="drop-down d-flex flex-column position-fixed mt-4">
                  <Link v-if="this.userLog.role == 'admin'" href="/admin"  class="btn m-2 header-text">Admin</Link>
                  <Link href="/admin" class="btn m-2 header-text">Perfil</Link>
                  <button v-on:click="logout" class="btn m-2 header-text">Log Out</button>
                </div>
              </div>
              
            
        </div>
        <div v-else class="user-login">
            <Link href="/login" class="mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation">Log In</Link>
        </div>
    </nav>
</template>

<script>
import { Link,usePage } from "@inertiajs/inertia-vue3";
import { computed } from 'vue'
import axios from 'axios'
import {Inertia} from "@inertiajs/inertia";

export default {
  data() {
    return {
      userLog : null,
      userimage : String,
      showOptions : false
    }
  },
  setup() {
    const user = computed(() => usePage().props.value.auth.user)
    return { 
      user, 
      }
  },
  props: {
        page : String,
  },
  components: {
      Link,
  },
  methods:{
    async getImage() {
      try {
          await axios.get("/api/users/" + usePage().props.value.auth.user.id)
          .then((response)=>{
            console.log(response.data.data)
            this.userLog = response.data.data
          })
        } catch (err) {
          console.log(err)
        }
    },
    async logout() {
      try {
          await axios.post("/logout")
          .then(()=>{
              Inertia.get("/")
          })
        } catch (err) {
          console.log(err)
        }
    }
  },
  created(){
    this.userLog = this.user
    this.getImage()
  }
}

</script>

<style scoped>
.drop-down{
  background-color: white;
  z-index: 10;
}
.header-text {
  font-size: clamp(0em,2vw,1.6em) !important;
}

.header-lvl {
  font-size: clamp(0em,4vw,1.6em) !important;
}

.text-primary{
  margin-right: clamp(0.2em,2.5vw,2.6em) !important;
}

.img-profile{
  width: clamp(0em,9vw,5em) !important;
  height: clamp(0em,9vw,5em) !important;
  background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.45);
}
.selected:after {
  content: '';
  position: absolute;
  width: 120%;
  transform: scaleX(1) !important;
  height: 2px;
  bottom: -15%;
  left: -10%;
  background-color: #0087ca;
  transform-origin: bottom right;
}

.hover-underline-animation {
  display: inline-block;
  position: relative;
  color: #0087ca;
}

.hover-underline-animation:after {
  content: '';
  position: absolute;
  width: 120%;
  transform: scaleX(0);
  height: 2px;
  bottom: -15%;
  left: -10%;
  background-color: #0087ca;
  transform-origin: bottom right;
  transition: transform 0.25s ease-out;
}

.hover-underline-animation:hover:after {
  transform: scaleX(1);
  transform-origin: bottom left;
}


</style>