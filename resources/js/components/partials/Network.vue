<template>

<div class="box-network d-flex justify-content-center align-content-center row">

   <div class="box-img-network col-4"></div>

   <div class="text-network col-8">
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
     .box-img-network{
       width: 40%;
       min-height: 400px;
       background-image: url(https://img.freepik.com/premium-vector/coworking-illustration-stylized-banner-with-people-sharing-office-self-directed-collaborative-flexible-voluntary-work-hipsters-freelancers-modern-brainstorming-talk_126608-1023.jpg);
       background-size: cover;
       background-position: center;

     }
     .text-network{
       width: 60%;
       height: 100%;
       padding: 80px;
      //  background-color: ;
         h2{
           font-size: 40px;
         }
     }
}

</style>