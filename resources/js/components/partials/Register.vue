<template>

<div class="box-register d-flex">

  <div class="box-text-register text-center container">
    <h2>Sei un freelancer?</h2>
    <p>Iscriviti e raggiungi i tuoi clienti</p>
    <router-link to="/register">

      <button class="btn btn-info" type="submit">Iscriviti</button>

    </router-link>
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
   min-height: 400px;

     .box-text-register{
       height: 100%;
       padding: 80px;
      //  background-color:rgb(137, 189, 167);
         p{
           font-size: 20px;
         }
     }
}

</style>