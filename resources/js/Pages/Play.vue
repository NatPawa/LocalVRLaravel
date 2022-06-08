<template>
    <Header :page="'play'"/>
    <Transition
      enter-active-class="animate__animated animate__fadeInLeft"
      leave-active-class="animate__animated animate__fadeOutRight"
    >
      <qrcode-stream  v-if="!scanned" @decode="onDecode"></qrcode-stream>
      <GameSelector v-else :QRName="this.QRName" ></GameSelector>
    </Transition>
</template>
<script>
import GameSelector from "../components/GameSelector.vue"
import Header from "../components/Header.vue"
import { QrcodeStream } from 'vue3-qrcode-reader'
 
export default {
    components: {
    Header,
    GameSelector,
    QrcodeStream
},
  data() {
    return {
      QRName: String,
      responseData : {},
      scanned : false
    }
  }
  ,methods: {
  onDecode (decodedString) {
    console.log(decodedString)
    this.QRName = decodedString
    this.scanned = true
  },
},
    props: ["test"],
};
</script>

