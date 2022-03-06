<template>

<header class="d-flex align-items-center justify-content-end">
  
     <button class="button-search">
        <router-link :to="{ name:'freelancerList'}"> 
          Cerca il tuo freelancer
        </router-link>
     </button>


</header>

 
</template>

<script>
export default {
  name: "Header",

  // data(){
  //   return {
  //      
  //   }
  // }
}
</script>

<style scoped lang="scss">

  header{
    height: 70px;
    width: 100%;
    background-color: #1A3854;

      .button-search{
        background-color: aqua;
        border-radius: 10px;
        border: none;
        margin-right: 10px;
        width: 200px;
        height: 40px;
        text-decoration: none;
      }

      router-link{
        background-color: aquamarine;
        text-decoration: none;
      }
  }


   
</style>