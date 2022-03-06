<template>
  <div class="container">
    <!-- <div class="input-group mb-3">
      <input 

      type="text" 
      class="form-control" 
      placeholder="Cerca il tuo freelancers" >
      <div class="input-group-append">
        <router-link :to="{ name:'freelancerList'}" tag="button"> 
          Cerca
        </router-link>
      </div>
    </div> -->

      <Search
        :categories="categories"
        :skills="skills"
         @getUserCategory="getUserCategory"
         @getUserSkill="getUserSkill"
         @getUserAll="getUsers"
      />
   <div v-if="success">
     <div class="container d-flex flex-wrap">
      <FreelancerCard
       v-for="(user, index ) in users"
       :key="index"
       :freelancerCard = "user"
      />
     </div>
    </div>
     <div v-else> 
       <h2>{{error_msg}}</h2>
     </div>

    



  </div>
</template>

<script>
import FreelancerCard from '../partials/FreelancerCard.vue';
import Search from '../pages/Search.vue';



export default {

 name: 'Players',
 components:{
   FreelancerCard,
   Search
 },

 data(){
   return{

    //  apiUrl: 'http://127.0.0.1:8000/api/players?page=',
     apiUrl: 'http://127.0.0.1:8000/api/users',
     pathCategory: '/usercategory/',
     pathSkill: '/userskill/',
     pathPage: '?page=',
     users: null,
     pagination:{},
     categories: [],
     skills: [],
     success: true,
     error_msg: '',
     title: 'Tutti i freelancers',
     globalUsers: true


   }
 },

 mounted(){
   this.getUsers();
  //  console.log(categories);
 },

 methods:{

   getUserCategory(slug_c){
  
      console.log(slug_c);
      this.reset();
      axios.get(this.apiUrl + this.pathCategory + slug_c)
     .then(res=> {
     
       this.users = res.data.category.users;
       this.globalUsers = false;
       this.title = "Freelancer della categoria:  " + res.data.category.name;
       if(!res.data.success){
          this.error_msg = res.data.error;
          this.success = false;
       }

     })
     
   },
   getUserSkill(slug_s){
  
      console.log(slug_s);
      this.reset();
      axios.get(this.apiUrl + this.pathSkill + slug_s)
     .then(res=> {
     
       this.users = res.data.skill.users;
       this.globalUsers = false;
       this.title = "Freelancers con skill:  " + res.data.skill.name;
       if(!res.data.success){
          this.error_msg = res.data.error;
          this.success = false;
       }

     })
     
   },

   getUsers(page = 1){
     this.reset();
     axios.get(this.apiUrl + this.pathPage + page)
     .then(res=> {
       this.users = res.data.users.data;
       this.categories = res.data.categories;
       this.skills = res.data.skills;
       console.log('log users:', this.users);
       this.pagination = {
         current: res.data.users.current_page,
         last: res.data.users.last_page,
       }

     })
   },

   reset(){
       this.error_msg = ''
       this.success = true
       this.users = null
       this.title = 'Tutti i freelancers'
   }


 }

}

</script>

<style lang="scss" scoped>


</style>