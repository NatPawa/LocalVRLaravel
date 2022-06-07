<template>
     <div>
   
    <Header></Header>
    <qrcode-stream @decode="onDecode"></qrcode-stream>
  </div>
</template>
<script>
import Header from "../components/Header.vue"
import { QrcodeStream, QrcodeDropZone, QrcodeCapture } from 'vue-qrcode-reader'
 
export default {
    components: {
    Header,
    QrcodeStream
},methods: {
  onDecode (decodedString) {
    console.log(decodedString);
  }
},
    props: ["test"],
};
</script>

