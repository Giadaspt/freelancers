<template>
 <div>
  
  <div class="container">
     <div>
   <div v-if="user.name" class="container-details">

     <h3> {{ user.name }} {{user.lastname}} </h3>
     <p> Città: {{user.city}} </p>
     <!-- <p> Meda voto: {{player.media_voto}} </p>
     <p> Valore di mercato: {{player.valore_di_mercato}} M </p> -->
     <p> Descrizione: {{user.description_job}} </p>
     <p>
        Categoria: {{ user.categories[0].name }} </p>
     <span>Skills: </span>
     <p v-for="(skill, index) in user.skills"
     :key="index">
     
       {{ skill.name }}
     </p>
     <p>
        <button class="button-search">
          <router-link :to="{ name:'freelancerList'}"> 
          Torna alla lista
          </router-link>
        </button>
     </p>
    

   </div>
   <div class="container-details" v-else> <h3> Loading... </h3> </div>

  </div>
 

   </div>

  </div>
</template>

<script>


export default {

 name: 'Profile',

  data(){
   return{

     apiUrl: 'http://127.0.0.1:8000/api/users/',

     user:{
       lastname:'',
       name:'',
       city:'',
      //  media_voto:'',
      //  valore_di_mercato:'',
       category:{},
       skills:[],

     }
   }
 },

  methods:{
   getApi(){
      axios.get(this.apiUrl + this.$route.params.slug)
           .then(res=> {
              this.user = res.data;   
              // console.log(this.player);  
           })
    }
  },

   mounted(){
    this.getApi();
  }

 
}


</script>

<style lang="scss" scoped>


</style>