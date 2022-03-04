<template>
  <div class="container">
    <div class="input-group mb-3">
      <input 
      v-model="category"
      type="text" 
      class="form-control" 
      placeholder="Cerca il tuo freelancers" >
      <div class="input-group-append">
        <!-- :to="{ name:'freelancerList'}" -->
        <router-link :to="{ name:'freelancerList', params:{slug: category}}"  > 
          <button>

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
    }
  },

  methods:{

  }
}


</script>

<style>


</style>