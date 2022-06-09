<template>
<form @submit.prevent="updateSlider($event,item.id)" class="w-100 d-flex p-2 justify-content-evenly" v-for="item in sliderItems"  :key="item.id">
    <p>{{item.id}}</p>
    <label>Tipo: </label>
    <select name="type" v-model="item.type">
        <option value="text">Text</option>
        <option value="online" >Online</option>
    </select>
    <input name="title" :placeholder="item.title" :value="item.title" v-if="item.type == 'text'" type="text"/>
    <input name="description" :placeholder="item.description" :value="item.description" v-if="item.type == 'text'" type="text"/>
    <label>
        <input name="description" type="file" id="file" ref="file" @change="sendImage($event,item.id)"/>
    </label>
    <button type="submit">Actualizar</button>
</form>

</template>

<script>
import SliderOnline from "./SliderOnline.vue"
import axios from 'axios'

export default {
    components: {
    SliderOnline
  },
  data() {
    return {
      sliderItems : {},
      file : {}
    }
  },
  mounted(){
    this.getSlider()
  },
  methods: {
    async sendImage(event,id) {
      try {
        console.log(event.target.files[0]);
        let formData = new FormData();
        formData.append('cover', event.target.files[0])
          await axios.post("/slider/" + id + "/image",formData)
          .then((response)=>{
            console.log(response.data)
          })
        } catch (err) {
          console.log(err)
        }
    },
    async updateSlider(event,id) {
      try {
        
        let formData = new FormData();
            
        formData.append('type', event.target.elements.type.value)
        formData.append('title', event.target.elements.title.value)
        formData.append('description',  event.target.elements.description.value)

        console.log(formData)
        console.log( event.target.elements.title.value)
        console.log(event.target.elements.type.value)
          await axios.post("/slider/edit/" + id , formData)
          .then((response)=>{
            console.log(response.data)
          })
        } catch (err) {
          console.log(err)
        }
    },
    async getSlider() {
      try {
          await axios.get("/slider")
          .then((response)=>{
            console.log(response.data)
            this.sliderItems = response.data
          })
        } catch (err) {
          console.log(err)
        }
    },
  }
}
</script>

