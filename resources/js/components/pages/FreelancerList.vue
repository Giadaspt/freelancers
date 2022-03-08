<template>
  <div class="container-team4">
    
    <h1 class="mb-4 mt-4" >
      Lista dei freelancer per: {{ name }}
    </h1>

    <FreelancerCard
      v-for="(user, index ) in users"
      :key="index"
      :freelancerCard = "user"
      v-model="category"
    />

    <div class="back  mb-4 ">
      <a class="btn-freelance d-flex justify-content-center" @click="$router.go(-1)">Indietro</a>
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
      category: '',

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

    getRightCategory(){
      if(this.name === this.category.name){
        return this.success;
      } 
    }
    
  },

}
</script>

<style scoped lang="scss">
  .container-team4 {
    width: 70%;
    margin: 0 auto;
  }

  .back{
  width: 90px;
  height: 20px;
  text-align: center;
  cursor: pointer;

  a {
    padding: 4px;
  }
}
</style>