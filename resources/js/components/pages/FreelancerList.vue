<template>
  <div class="container freelancers">
    <h1 class="mb-4 mt-4">Lista dei freelancer per: {{ name }}</h1>
<div v-if="users">
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

<!-- LOADER -->
<div v-else>
<figure>
    <div class="dot white"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
</figure>
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

      category: "",
      categories: [],

      name: this.$route.params.name,
    }
  },

  mounted() {
    this.getCategory(this.name);

  }, 

  methods: {
 
    getCategory(name){
      this.reset();

      axios.get(this.apiUrl + 'categories/' + name)
      .then(res =>{
        this.users = res.data.category.users;
       
        console.log('user della chiamata',this.users);

      });
    },
    
    // getCategory(name){
    //   this.reset();

    //   axios.get(this.apiUrl + 'categories/' + name)
    //   .then(res =>{
    //     this.users = res.data.category.users;
       
    //     console.log('user della chiamata',this.users);

    //   });
    // },
    
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
figure { 
  position: absolute;
  margin: auto;
  top: 0; bottom: 0; left: 0; right: 0;
  width: 6.250em; height: 6.250em;
  animation: rotate 2.4s linear infinite;
}
.white { 
  top: 0; bottom: 0; left: 0; right: 0; 
  background: white; 
  animation: flash 2.4s linear infinite;
  opacity: 0;
}
.dot {
  position: absolute;
  margin: auto;
  width: 2.4em; height: 2.4em;
  border-radius: 100%;
  transition: all 1s ease;
}
.dot:nth-child(2) { top: 0; bottom: 0; left: 0; background: #FF4444; animation: dotsY 2.4s linear infinite; }
.dot:nth-child(3) { left: 0; right: 0; top: 0; background: #FFBB33; animation: dotsX 2.4s linear infinite; }
.dot:nth-child(4) { top: 0; bottom: 0; right: 0; background: #99CC00; animation: dotsY 2.4s linear infinite; }
.dot:nth-child(5) { left: 0; right: 0; bottom: 0; background: #33B5E5; animation: dotsX 2.4s linear infinite; }

@keyframes rotate {
  0% { transform: rotate( 0 ); }
  10% { width: 6.250em; height: 6.250em; }
  66% { width: 2.4em; height: 2.4em; }
  100%{ transform: rotate(360deg); width: 6.250em; height: 6.250em; }
}

@keyframes dotsY {
  66% { opacity: .1; width: 2.4em; }
  77%{ opacity: 1; width: 0; }
}
@keyframes dotsX {
  66% { opacity: .1; height: 2.4em;}
  77%{ opacity: 1; height: 0; }
}

@keyframes flash {
  33% { opacity: 0; border-radius: 0%; }
  55%{ opacity: .6; border-radius: 100%; }
  66%{ opacity: 0; }
}


</style>