<template>

<div id="carouselExampleControls" class="carousel slide" > <!--data-bs-ride="carousel"-->
  <div class="carousel-inner">
    <div v-for="(item,index) in sliderItems"  :key="item.id"  :class="index == 0 ? 'carousel-item active position-relative' : 'carousel-item'">
      <div v-if="item.type === 'text'" class="text-light info w-100 h-100 position-absolute z-index1 d-flex flex-column justify-content-center ">
            <h1 class="align-self-center font-weight-bold">{{item.title}}</h1>
            <p class="align-self-center">{{item.description}}</p>
      </div>
      <div v-else-if="item.type === 'online'" class="info w-100 h-100 position-absolute z-index1">
        <SliderOnline class="w-100 h-100"></SliderOnline>
      </div>
      <img :src="item.urlcover" class="img-item d-block w-100" alt="...">
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>

</div>

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
    }
  },
  mounted(){
    this.getSlider()
  },
  methods: {
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


<style scoped>

.img-item {
  height: 50vw;
  width: 100%;
}

.carousel-item:after {
  content:"";
  display:block;
  position:absolute;
  top:0;
  bottom:0;
  left:0;
  right:0;
  background:rgba(0,0,0,0.4);
}

.carousel-control-prev, .carousel-control-next {
  width: 7%;
}

</style>