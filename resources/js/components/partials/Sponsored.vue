<template>
<div class="my-5">
<h2>Freelancer in evidenza</h2> 
<div class="box-sponsored d-flex justify-content-center flex-wrap">
   
   <!-- <Profile
     v-for="(i, index) in 3" :key="index"
   /> -->

   <!-- <p> {{selected_sponsored}} </p> -->

 <!-- PROFILO 1 -->
   <div class="box-profile d-flex" v-for="user in sponsored" :key="`user${user.id}`" >
    <!-- <div class="box-profile d-flex" v-if="user.sponsorships.length > 0"> -->

        <div class="left-box">
            <div class="box-img">
              
            </div>
            <div class="box-info">

               <h3 class="my-3">{{user.name}}</h3>
               <p> {{user.city}} </p>
               <h6>Media recensioni</h6>
        <!-- <p> qui il dato dinamico delle reviews </p> -->
                
             </div>
        
        </div>

        <div class="right-box">
            <div class="user-info">
               <h5>Categoria</h5>
               <p> {{user.categories[0].name}} </p>
               <h5>Skills principali</h5>
               <p> {{user.skills[0].name}} </p>
               <h5>Panoramica</h5>
                <div class="box-description">
                    <p> {{user.description_job}} </p>
                </div>
            </div>

            <!-- <div class="box-buttons d-flex justify-content-center">
              <button class="btn-profile">Vedi</button>
            </div> -->
             <router-link :to="{ name:'profile/', params:{user: user, name: user.name}}">
               <button class="btn btn-freelance m-4">Vai al profilo</button>
            </router-link>
        </div>

    <!-- </div> -->
   
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
   width: 330px;
   height: 400px;
   border-radius: 20px;
   overflow: hidden;
   background-color: rgb(195, 213, 228);
     .left-box{
       padding: 10px;
       width: 40%;
       height: 100%;
       border: 1px solid lightgray;
      //  background-color: coral;
         .box-img{
           width: 105px;
           height: 105px;
           background-color: white;
           border-radius: 50%;
           overflow: hidden;
             img{
               width: 100%;
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
       border: 1px solid lightgray;
      //  background-color: rgb(150, 255, 80);
         .user-info{
           width: 100%;
           height: 85%;
             .box-description{
                font-size: 13px;
                height: 50%;
                width: 100%;
                overflow: auto;
             }
         }

         .box-buttons{
             padding: 10px;
              .btn-profile {
                width: 100px !important;
                margin: 7px;
                padding: 7px;
                background-color: #5165F6;
                border: none;
                border-radius: 10px;
                color: white;
                  &:hover{
                    background-color: #6b7add
                  }
              }
         }

        
     }
}

</style>