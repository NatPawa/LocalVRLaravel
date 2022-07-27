<template>
    <transition-group
        name="games"
        tag="div"
        :css="false"
        class="gamesList"
        v-on:before-enter="beforeEnter"
        v-on:enter="enter"
        v-on:leave="leave"
    >
    <div class="game w-100 h-100 p-5" v-for="game in games"  :key="game.id" :style="{ backgroundImage: 'url( ' + game.urlcover + ')' }">
        <div class="w-100 h-100 m-3 flex-column">
            <div class="text-light d-flex justify-center position-relative float-end align-content-center h4">
                <p class="h-100 w-100 mb-0">{{game.numplayers}}</p>
                <i class="fa-solid fa-user h-100 w-100 ml-1"></i>
            </div>
            <div class="logo w-100 d-flex justify-content-center">
                <img :src="game.urllogo" class="img-logo"/>
            </div>
            <div class="info d-flex flex-column m-5">
                <h1 class="name text-light font-weight-bold" >{{ game.name }}</h1>
                <p class="description text-light font-weight-light">{{ game.description }}</p>
                <div class="d-flex w-100">
                    <p class="textyearcreation text-light font-weight-normal">Año de creación:</p>
                    <p class="yearcreation text-light font-weight-light ml-1">{{ game.yearcreation }}</p>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button v-if="this.userlog.game !== game" v-on:click="setOnline(game)" @mouseover="this.showIcon = game.id" @mouseleave="this.showIcon = null" class=" d-flex btn primary-background text-light rounded-pill p-3 justify-center justify-content-center">Jugar <Transition enter-active-class="animate__animated animate__fadeIn animate__fast" leave-active-class="animate__animated animate__fadeOut animate__fast"><i v-if="this.showIcon == game.id" class="fa fa-play ml-1 align-self-center"></i></Transition></button>
                <button v-else v-on:click="quitOnline(game)" class="d-flex btn danger-background text-light rounded-pill p-3 justify-center justify-content-center">Stop<i class="fa fa-stop ml-1 align-self-center"></i></button>
            </div>
        </div>
    </div>
  </transition-group>

    <Transition enter-active-class="animate__animated animate__fadeIn" leave-active-class="animate__animated animate__fadeOut">
    <a v-if="this.load" v-on:click="showInput" class="primary-background float d-flex justify-content-center">
            <div v-if="isSearching" class="w-100 m-3">
                <input v-model="this.search" ref="search"  @focusout="search.length == '' ? isSearching = false : isSearching = true"  @keyup="getGamesBySearch" type="text" id="fname" name="fname">
            </div>
        <i v-if="search.length == 0" class="fa fa-search my-float"></i>
        <a v-else v-on:click.stop="search = ''; isSearching = false;getGamesByQRName() "><i  class="fa fa-trash my-float"></i></a>
    </a>
    </Transition>

    <Transition enter-active-class="animate__animated animate__fadeIn" leave-active-class="animate__animated animate__fadeOut">
    <a v-if="this.load" v-on:click="cancelSearch" class="float-cancel primary-background d-flex justify-content-center">
        <i class="fa fa-close my-float"></i>
    </a>
    </Transition>
  
</template>

<script>
import io from "socket.io-client" 
import axios from 'axios'
import { nextTick } from 'vue'
import { usePage } from "@inertiajs/inertia-vue3"

  export default {
  props: {
    QRName : String
  },
  mounted() {
    this.connectSocket()
    this.getGamesByQRName()
  },
  data() {
    return {
      showIcon : false,
      search: "",
      device : {},
      games : {},
      load: false,
      element: [],
      isSearching : false,
      socket : {},
      userlog : null
    }
  },
  methods: {
    connectSocket(){
      this.socket = io("127.0.0.1:3000",process.env.VUE_APP_SOCKET_ENDPOINT)
      this.getUser()
    },
    async getUser() {
      try {
          await axios.get("/api/users/" + usePage().props.value.auth.user.id)
          .then((response)=>{
            console.log(response.data.data)
            this.userlog = response.data.data
          })
        } catch (err) {
          console.log(err)
        }
    },
    setOnline(game) {
      console.log("Tring to send user");
      this.userlog.game = game
      console.log(this.userlog.game.urlcover);
      this.socket.emit('userConnected', this.userlog)
    },
    quitOnline() {
      this.socket.emit('userDisconected', this.userlog)
      this.userlog.game = null
    },
    showInput() {
      this.isSearching = true;

      this.$nextTick(() => {
        this.focusInput();
      });
    },
    focusInput() {
      this.$refs.search.focus();
    },
  async getGamesByQRName() {
      if (this.QRName) {
        try {
          await axios.get("/api/devices/" + this.QRName)
          .then((response)=>{
            console.log("/api/devices/" + this.QRName)
            this.device = response.data 
            this.games = this.device.games 
            console.log(response.data)
            this.load = true
          })
        } catch (err) {
          console.log(err)
        }
      }
    },

 async getGamesBySearch() {
      if (this.search) {
        try {
        const params = {
            search: this.search
        }
          await axios.get("api/devices/" + this.device.id + "/gameSearch",{params})
          .then((response)=>{
            this.games = response.data
            console.log(response.data)
            this.load = true
          })
        } catch (err) {
          console.log(err)
        }
      }else{
          console.log("Nothing")
          this.getGamesByQRName()
      }
    },
    beforeEnter: function (el) {
      el.style.opacity = 0
      el.style.height = 0
    },
    enter: function (el, done) {
      console.log("Element: " + el.className)
      var elementHeight = el.clientHeight * 150
      var delay = el.dataset.index * 150
      setTimeout(function () {
        Velocity(
          el,
          { opacity: 1, height: elementHeight },
          { complete: done }
        )
      }, delay)
    },
    leave: function (el, done) {
      var delay = el.dataset.index * 150
      setTimeout(function () {
        Velocity(
          el,
          { opacity: 0, height: 0 },
          { complete: done }
        )
      }, delay)
    }
},
}
</script>

<style scoped>
input[type="text"]
{
    background: rgba(0, 0, 0, 0);
    border: none;
    outline: none;
	color:#FFF;
}
.float-cancel{
	position:fixed;
	height:60px;
	bottom:40px;
	right:40px;
	color:#FFF;
	border-radius:50px;
	text-align:center;
}

.float{
	position:fixed;
	height:60px;
	bottom:40px;
	right: 130px;
	color:#FFF;
	border-radius:50px;
	text-align:center;
}

.my-float{
	margin: 1.5rem;
}

.game{
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.75);
}

.img-logo{  
    height: clamp(10em,25vw,18em);
}

</style>