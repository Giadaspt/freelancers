<template>

<div class="box-about  row d-flex align-items-center justify-content-between">
  
  <div class="box-text-about text-center col-12 col-md mr-5">
    <h2>Dicono di noi</h2>
    <h3>Oltre il 99% di clienti soddisfatti</h3>
  </div>

  <div class="box-img-about text-right col-12 col-md ml-2">
    <img src="..\img\voti.jpg" alt="">
  </div>

</div>
 
</template>

<script>
export default {
  name: "AboutUs",

  methods:{

  }
}


</script>

<style lang="scss" scoped>

 .box-about{
  width: 85%;
  margin: auto;

     .box-img-about{
       margin-bottom: 50px;
       max-width: 650px;
       img{
        width: 100%;
        border-radius: 15px;
        box-shadow: 0px 1px 10px rgb(255, 255, 255, 0.5);
       }
      
     }
     .box-text-about{
       margin-bottom: 50px;
      //  h2 h3{
      //    font-size: 3vw !important;
      //  }

     }
}

</style>