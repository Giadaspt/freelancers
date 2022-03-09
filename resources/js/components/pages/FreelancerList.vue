<template>
  <div class="container">
    <h1 class="mb-4 mt-4">Lista dei freelancer per: {{ name }}</h1>

    <FreelancerCard
      v-for="(user, index ) in users"
      :key="index"
      :freelancerCard = "user"
      v-model="name"
    />
    <div class="back mt-4 mb-4">
      <a class="btn-freelance btn-back justify-content-center" @click="$router.go(-1)">Indietro</a>
    </div>

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
      apiUrl: 'http://127.0.0.1:8000/api/',
      users: null,
      success: true,
      errrorMsg: "",

      name: this.$route.params.name,
    }
  },

  mounted() {
    this.getCategory(this.name);
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

    getCategory(name){
      this.reset();

      axios.get(this.apiUrl + 'categories/' + name)
      .then(res =>{
        this.users = res.data.category.users;
       
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

<style scoped lang="scss">
  .back{
  width: 90px;
  height: 20px;
  text-align: center;
  .btn-back {
    cursor: pointer;
    padding: 4px;
  }
}
</style>