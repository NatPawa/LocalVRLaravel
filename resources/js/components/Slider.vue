<template>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    
    <div class="carousel-item active">
      <div class="w-100 h-100">
        <img src="/Games/covers/t99N6jPfwm4RF04wkC6Qeqoa2FP6kdWFrGgKJAhu.jpg" class="img-item d-block w-100" alt="...">
      </div>
    </div>

    <div class="carousel-item">
      <img src="/Games/covers/qUMJLNSciMuAjWBbqO63tViZpYlBpMqfTdLXPQPk.jpg" class="img-item d-block w-100" alt="...">
    </div>

    <div class="carousel-item">
      <img src="/Games/covers/qUMJLNSciMuAjWBbqO63tViZpYlBpMqfTdLXPQPk.jpg" class="img-item d-block w-100" alt="...">
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