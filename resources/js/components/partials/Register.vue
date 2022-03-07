<template>

<div class="box-register d-flex">
  
  <div class="box-img-register"></div>

  <div class="box-text-register text-center p-4">
    <h2>Sei un freelancer?</h2>
    <p>Iscriviti e raggiungi i tuoi clienti</p>
  </div>
 


</div>
 
</template>

<script>
export default {
  name: "Register",

  methods:{

  }
}


</script>

<style lang="scss" scoped>

 .box-register{
   width: 100%;
   height: 300px;
     .box-img-register{
       width: 30%;
       height: 100%;
       background-color:rgb(11, 72, 184);
     }
     .box-text-register{
       width: 70%;
       height: 100%;
       background-color:rgb(137, 189, 167);
         p{
           font-size: 20px;
         }
     }
}

</style>