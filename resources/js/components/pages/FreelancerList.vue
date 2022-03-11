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
      users: [],
      success: true,
      errrorMsg: "",

      category: "",
      categories: [],

      name: this.$route.params.name,
    }
  },

  mounted() {
    this.getCategory();

  }, 

  methods: {
    // getCategory(name){
    //   this.reset();

    //   axios.get(this.apiUrl + 'categories' + name)
    //   .then(res =>{
    //     this.users = res.data.category.users;
       
    //     console.log('user della chiamata free list',this.users);

        
    //   });
    // },

    getCategory(){
      this.reset();

      axios.get(this.apiUrl )
      .then(res =>{
        this.categories = res.data.categories;
       
        console.log('user della chiamata free list',this.categories);

        this.getCatUsers();
      });
    },
    
    getCatUsers(){

      let cats = this.categories;
      // console.log(cats);

      cats.forEach(cat => {
        let varCat = cat.name.toLowerCase();
        // console.log(varCat);
      

        if(varCat.includes(this.name.toLowerCase())){
          console.log(this.name.toLowerCase());
          
          let utenti =  cat.users;
          let utentini = [];

          utenti.forEach(user => {

            utentini.push(user);
           this.users = utentini;


            console.log('this user', user);
            console.log('push this utetnini', utentini );

            console.log('push this user', this.users);
          });

          
        }

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