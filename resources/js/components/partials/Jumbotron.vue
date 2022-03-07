<template>
  <div class="container">
    <div class="input-group mb-3">

      <input 
      type="text" 
      v-model="category"
      class="form-control" 
      placeholder="Cerca il tuo freelancers" >

      <div class="input-group-append">
        <router-link :to="{ path:'freelancerList/' + this.category, params:{name: this.name}}"  > 
        <!-- :to="{ name:'freelancerList'}" -->
        <!-- this.slug -->
          <button type="submit">
            Cerca
          </button>
        </router-link>
      </div> 
    </div>

  </div>
</template>

<script>
export default {
  name: "Jumbotron",

  data(){
    return{
      category: "",

      name: this.$route.params.name,
    }
  },

  methods:{

  }
}


</script>

<style>


</style>