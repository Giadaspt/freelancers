<template>
  <div class="container">
    <div class="input-group mb-3">
      <input 

      type="text" 
      class="form-control" 
      placeholder="Cerca il tuo freelancers" >
      <div class="input-group-append">
        <router-link :to="{ name:'freelancerList'}">
          Cerca

        </router-link>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "Jumbotron",

  data(){
    return {
      apiUrl: 'http://127.0.0.1:8000/api',
      users: null,
    }
  },

  mounted() {
    this.getApi();
  }, 

  methods: {
    getApi(){
      axios.get(this.apiUrl)
        .then(res => {
          this.users = res.data.users;
          console.log(this.users);
      });
    }
    
  },

}


</script>

<style>


</style>