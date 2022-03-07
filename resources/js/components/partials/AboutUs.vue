<template>

<div class="box-about d-flex">
  
  <div class="box-img-about"></div>

  <div class="box-text-about text-center p-4">
    <h2>Dicono di noi</h2>
    <p>Oltre il 99% di clienti soddisfatti</p>
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
   height: 300px;
     .box-img-about{
       width: 30%;
       height: 100%;
       background-color:darkgoldenrod;
     }
     .box-text-about{
       width: 70%;
       height: 100%;
       background-color:rgb(189, 174, 137);
         p{
           font-size: 20px;
         }
     }
}

</style>