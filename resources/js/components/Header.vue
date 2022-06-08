<template>
    <nav class="navbar navbar-light bg-light align-items-center p-3">
        
        <Link href="/" class="w-10">
            <img src="/ResourcesLocal/Logo/LogoLocalLletres.png" alt="" class="w-100">
        </Link>

        <div class="links">
                <Link href="/" :class="this.page == 'home' ? 'mr-5 text-primary fw-normal fs-5 hover-underline-animation selected': 'mr-5 text-primary fw-normal fs-5 hover-underline-animation'">Inicio</Link>
                <Link href="/play" :class="this.page == 'play' ? 'mr-5 text-primary fw-normal fs-5 hover-underline-animation selected': 'mr-5 text-primary fw-normal fs-5 hover-underline-animation'">Jugar</Link>
                <Link href="/game/edit" :class="this.page == 'events' ? 'mr-5 text-primary fw-normal fs-5 hover-underline-animation selected': 'mr-5 text-primary fw-normal fs-5 hover-underline-animation'">Eventos</Link>
                <Link href="/game/edit" :class="this.page == 'top' ? 'mr-5 text-primary fw-normal fs-5 hover-underline-animation selected': 'mr-5 text-primary fw-normal fs-5 hover-underline-animation'">Top</Link>
        </div>
        
        <div v-if="userLog !== null" class="user-image">
            <a class="navbar-brand d-flex align-items-center" v-on:click="logout">
                <h4 class="mr-2 mb-0 text-primary fs-5">{{user.name}}</h4>
                <div v-if="this.userLog.urlimage !== null" class="img-profile d-inline-block rounded-circle mr-1 d-flex align-content-center justify-content-center" :style="{ backgroundImage: 'url(' + this.userLog.urlimage + ')' }">
                    <p class="text-light font-weight-light align-self-center m-0">{{this.userLog.points}}</p>
                </div>
                <div v-else class="img-profile d-inline-block rounded-circle mr-1 d-flex align-content-center justify-content-center" style="backgroundImage: url(/ResourcesLocal/Default.png)">
                    <p class="text-light font-weight-light align-self-center m-0">{{this.userLog.points}}</p>
                </div>
                <i class="fa-solid fa-caret-down text-primary"></i>
            </a>
        </div>
        <div v-else class="user-login">
            <Link href="/login" class="mr-5 text-primary fw-normal fs-5 hover-underline-animation">Log In</Link>
        </div>
    </nav>
</template>

<script>
import { Link,usePage } from "@inertiajs/inertia-vue3";
import { computed } from 'vue'
import axios from 'axios'

export default {
  data() {
    return {
      userLog : null,
      userimage : String,
    }
  },
  setup() {
    const user = computed(() => usePage().props.value.auth.user)
    return { 
      user, 
      }
  },
  props: {
        page : String
  },
  components: {
      Link,
  },
  methods:{
    async getImage() {
      try {
          await axios.get("/api/users/" + usePage().props.value.auth.user.id)
          .then((response)=>{
            console.log(response.data)
            this.userLog = response.data
          })
        } catch (err) {
          console.log(err)
        }
    },
    async logout() {
      try {
          await axios.post("/logout")
          .then((response)=>{
            if(response.data == "logout"){
              console.log(response.data)
              this.userLog = null
            }
          })
        } catch (err) {
          console.log(err)
        }
    }
  },
  mounted(){
    this.userLog = this.user
    this.getImage()
  }
}

</script>

<style scoped>
.img-profile{
  width: clamp(3em,9vw,5em) !important;
  height: clamp(3em,9vw,5em) !important;
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