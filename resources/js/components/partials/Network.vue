<template>

<div class="box-network d-flex justify-content-center align-items-center">

   <div class="box-img-network d-flex justify-content-center align-items-center">
     <img src="..\img\1000_F_336109524_1kF7K2gTjZ8yoeC2HXsN2pRaaavee8UW.jpg" alt="">
   </div>

   <div class="text-network">
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
   width: 100%;
   min-height: 400px;
     .box-img-network{
       width: 50%;
       min-height: 500px;
       margin-right: 50px;
       img{
         width: 100%;
         border-radius: 15px;
         box-shadow: 0px 1px 10px rgb(255, 255, 255, 0.5);
       }
     

     }
     .text-network{
       width: 50%;
       height: 100%;
       
      //  background-color: ;
         h2{
           font-size: 40px;
         }
     }
}

</style>