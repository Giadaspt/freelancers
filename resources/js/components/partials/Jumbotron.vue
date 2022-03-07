<template>
 <div class="jumbotron">
  <div class="container">
     <h1> Assumi i migliori freelancers online </h1>
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

<style lang="scss" scoped>

 .jumbotron{
   width: 100%;
   height: 400px;
   background-color: rgb(184, 202, 202);
   margin-bottom: 0;
     h1{
       font-size: 90px;
       margin-bottom: 25px;
       color: #5165F6;
     }
}



</style>