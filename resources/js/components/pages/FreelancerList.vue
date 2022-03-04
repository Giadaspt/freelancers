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
      category: [],
      success: true,
      errrorMsg: "",
    }
  },

  mounted() {
    this.getCategory(slug);
  }, 

  methods: {
    getApi(){
      this.reset();

      axios.get(this.apiUrl)
        .then(res => {
          this.users = res.data.users;

          console.log(this.users);
      });
    },

    getCategory(slug){
      this.reset();

      axios.get(this.apiUrl + '/categories'+ slug)
      .then(res =>{
        this.users = res.data.categories;

        console.log('user della chiamata',this.users);

      });
    },

    reset(){
      this.users = null;
      this.success = true;
      this.errorMsg = "";
    },


    
  },

}
</script>

<style>

</style>