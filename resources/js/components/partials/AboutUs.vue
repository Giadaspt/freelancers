<template>

<div class="box-about d-flex justify-content-center align-items-center">
  
  <div class="box-text-about text-center">
    <h2>Dicono di noi</h2>
    <h3>Oltre il 99% di clienti soddisfatti</h3>
  </div>

  <div class="box-img-about text-right d-flex justify-content-center align-items-center">
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
   width: 100%;
   min-height: 400px;
   padding-bottom: 100px;
     .box-img-about{
       width: 50%;
       height: 100%;
       img{
         border-radius: 15px;
         box-shadow: 0px 1px 10px rgb(255, 255, 255, 0.5);
       }
      
     }
     .box-text-about{
       
       width: 50%;
       height: 100%;
       font-size: 120%;

     }
}

</style>