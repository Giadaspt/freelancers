<template>
  <div class="container">
    <h1 class="mb-4 mt-4">Lista dei freelancer per categoria</h1>

    <FreelancerCard
      v-for="(user, index ) in users"
      :key="index"
      :freelancerCard = "user"
    />

  </div>
</template>

<script>
import FreelancerCard from '../partials/FreelancerCard.vue';

export default {
  name: "FreelancerList",

  components: {
    FreelancerCard,
  },

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