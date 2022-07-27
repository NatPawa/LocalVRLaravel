<template>
    <nav class="navbar navbar-light bg-light align-items-center p-3">
        
        <Link href="/" class="w-10">
            <img src="/ResourcesLocal/Logo/LogoLocalLletres.png" alt="" class="w-100">
        </Link>

        <div class="links">
                <Link href="/" :class="this.page == 'home' ? 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation selected': 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation'">Inicio</Link>
                <Link href="/play" :class="this.page == 'play' ? 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation selected': 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation'">Jugar</Link>
                <Link href="/events" :class="this.page == 'events' ? 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation selected': 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation'">Eventos</Link>
                <Link href="/game/edit" :class="this.page == 'top' ? 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation selected': 'mr-5 text-primary header-text fw-normal fs-5 hover-underline-animation'">Top</Link>
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
                  <Link v-else-if="this.userLog.role == 'editor'" href="/admin"  class="btn m-2 header-text">Editor</Link>
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
  mounted(){
    this.userLog = this.user
    this.getImage()
  }
}

</script>

<style scoped>



</style>