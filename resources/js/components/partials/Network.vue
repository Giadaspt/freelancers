<template>

<div class="box-network row d-flex align-items-center justify-content-center">

   <div data-aos="fade-right" data-aos-duration="3000" class="box-img-network col-12 col-md mr-5">
     <img src="..\img\network.jpg" alt="">
   </div>

   <div data-aos="fade-left" data-aos-duration="3000" class="text-network col-12 col-md ml-2">
     <h2 class="text-left">Il più grande network di freelancers italiano, con più di 50.000 iscritti attivi</h2>
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
   width: 85%;
   margin: 100px auto;

     .box-img-network{
       margin-bottom: 50px;
       img{
         width: 100%;
         border-radius: 15px;
         box-shadow: 0px 1px 10px rgb(255, 255, 255, 0.5);
       }
     }
     .text-network{
      margin-bottom: 50px;
        //  h2{
        //    font-size: 3vw !important;
        //  }
     }
}

</style>