<template>
  <div class="h-100 w-100">
    <div class="d-flex w-100 h-100 justify-content-evenly align-content-center">
      <div class="text-light w-100 h-100 d-flex justify-content-center align-content-center" v-if="Object.keys(usersConnected).length === 0 || usersConnected === null">
        <h2 class=" align-self-center">No hay jugadores conectados</h2>
      </div>
      <div class="d-flex h-100 flex-column justify-content-center" v-for="user in usersConnected"  :key="user.id">
          <img class="m-0 img-profile align-self-center mr-1 d-flex rounded-circle align-content-center justify-content-center" :src="user.game.urllogo"/>
          <h4 class="text-light align-self-center mt-3">Playing</h4>
          <div v-if="user.urlimage !== null" class=" m-0 img-profile-slider d-inline-block rounded-circle mr-1 d-flex align-content-center justify-content-center" :style="{ backgroundImage: 'url(' + user.urlimage + ')' }">
              <h3 class="header-lvl text-light font-weight-normal align-self-center m-0">{{user.level}}</h3>
          </div>
          <div v-else class="m-0 img-profile-slider d-inline-block rounded-circle mr-1 d-flex align-content-center justify-content-center" style="backgroundImage: url(/ResourcesLocal/Default.png)">
              <h3 class="header-lvl text-light font-weight-normal align-self-center m-0 ">{{user.level}}</h3>
          </div>
          <h4 class="text-light align-self-center mt-3">{{user.name}}</h4>
      </div>
    </div>
  </div>
</template>

<script>
import io from "socket.io-client" 

export default {
  
  data() {
    return {
      isConnected: false,
      usersConnected: {},
      socket : {},
    }
  },mounted(){
    //const socket = new io("127.0.0.1:3000", {});
    this.socket = io("127.0.0.1:3000",process.env.VUE_APP_SOCKET_ENDPOINT)

    this.socket.on('game:list', data => {
        this.usersConnected = data 
    });
  },
  created(){
  },
  methods: {
    
  }
}
</script>
