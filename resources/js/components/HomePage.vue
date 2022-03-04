<template>
  <div class="container">
    <div class="input-group mb-3">
      <input 

      type="text" 
      class="form-control" 
      placeholder="Cerca il tuo freelancers" >
      <div class="input-group-append">
        <router-link :to="{ name:'freelancerList'}" tag="button"> 
          Cerca
        </router-link>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "HomePage",
}


</script>

<style>


</style>