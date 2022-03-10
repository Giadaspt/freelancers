<template>
<div class="my-5">
<h2>Freelancer in evidenza</h2> 
<div class="box-sponsored d-flex justify-content-start flex-wrap">
   
   <!-- <Profile
     v-for="(i, index) in 3" :key="index"
   /> -->

   <!-- <p> {{selected_sponsored}} </p> -->

 <!-- PROFILO 1 -->
   <div class="box-profile d-flex" v-for="user in sponsored" :key="`user${user.id}`" >
    <!-- <div class="box-profile d-flex" v-if="user.sponsorships.length > 0"> -->

        <div class="left-box">
            <div class="box-img" v-if="user.image">
              <img :src="'/storage/' + user.image" alt="" style="border-radius: 50%">
            </div>
            <div class="box-img" v-else>
              <img :src="'storage/img/istockphoto-1223671392-612x612.jpg'" alt="" style="border-radius: 50%">
            </div>
            

            
            <div class="box-info mt-4 pl-4 ">
              
               <h5>Descrizione</h5>
                <div class="box-description ">
                    <p> {{user.description_job}} </p>
                </div>           
             </div>
        
        </div>

        <div class="right-box">
            <div class="user-info">
              <h3 class="my-3">{{user.name}}</h3>
              <h6>Media recensioni</h6>
               <p> {{user.city}} </p>
             
              <div class="pl-4">
               <h5>Mi occupo di:</h5>
               <p> {{user.categories[0].name}} </p>
               <h5>I miei punti di forza:</h5>
               <p> {{user.skills[0].name}} </p>       

              </div>
              
            </div>

            <div class="d-flex justify-content-end">
             <router-link :to="{ name:'profile/', params:{user: user, name: user.name}}">
               <button class="btn btn-freelance mb-4 " type="submit">Vai al profilo</button>
            </router-link>

            </div>
        </div>

   
   
  </div> 


</div>
 </div>
</template>

<script>
// import Profile from './Profile.vue'
export default {
  name: "Sponsored",

  props: {
    "freelancerCard": Object,
  },

  // components:{
  //   Profile
  // },

  mounted(){
     this.getSponsored();
     
  },

  data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/',
      sponsored: [],
      name:this.$route.params.name
    }
  },

  methods:{
    getSponsored(){
      axios.get(this.apiUrl)
        .then(res => {
          this.sponsored = res.data.selected_sponsored;  
          console.log('sponsored:', this.sponsored);  
      });
    }, 
  },

  
}


</script>

<style lang="scss" scoped>

//  .box-sponsored{
//    width: 100%;
//    height: 400px;
//   margin: 50px 0;
// }

.global-box-profile{
  border-radius: 20px;
}

 .box-profile{
   margin: 10px; 
   width: 400px;
   height: 400px;
   border-radius: 20px;
   padding: 6px;
   
   background-color: rgb(195, 213, 228);
     .left-box{
       padding: 10px;
       width: 40%;
       height: 100%;
      
      //  background-color: coral;
         .box-img{
           width: 105px;
           height: 105px;
                
             img{
               width: 100%;
               height: 100%;
               object-fit: cover;
             }
         }

         .box-info{
           width: 100%;
         }
     }
     .right-box{
       padding: 10px;
       width: 60%;
       height: 100%;
     
      //  background-color: rgb(150, 255, 80);
         .user-info{
           width: 100%;
           height: 85%;
             .box-description{
                font-size: 13px;
                height: 40%;
                width: 100%;
                overflow: auto;
             }
         }

        
     }
}

</style>