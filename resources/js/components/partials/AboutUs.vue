<template>

<div class="box-about d-flex justify-content-center align-content-center">
  
  <div class="box-text-about text-center">
    <h2>Dicono di noi</h2>
    <h3>Oltre il 99% di clienti soddisfatti</h3>
  </div>

  <div class="box-img-about text-right">
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
     .box-img-about{
       width: 50%;
       height: 100%;
      
     }
     .box-text-about{
       padding: 150px;
       width: 50%;
       height: 100%;
       font-size: 120%;

     }
}

</style>