<template>

<div class="box-network d-flex">

   <div class="box-img-network"></div>

   <div class="text-network d-flex align-items-center">
     <h2 class="text-center">Il più grande network di freelancers italiano, con più di 50.000 iscritti attivi</h2>
   </div>


</div>
 
</template>

<script>
export default {
  name: "Network",

  methods:{

  }
}


</script>

<style lang="scss" scoped>

 .box-network{
   width: 100%;
   height: 300px;
     .box-img-network{
       width: 30%;
       height: 100%;
       background-color: aqua;
     }
     .text-network{
       width: 70%;
       height: 100%;
       background-color: chartreuse;
         h2{
           font-size: 40px;
         }
     }
}

</style>