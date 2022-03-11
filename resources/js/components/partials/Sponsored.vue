<template>
<div class="my-5">
<h2 class="text-center my-5">Freelancer in evidenza</h2> 
  <div class="box-sponsored d-flex justify-content-center flex-wrap" v-if="sponsored">
      <div class="box-profile d-flex" v-for="user in sponsored" :key="`user${user.id}`" >
        
          <div class="left-box">
              <div class="box-img">
                <img class=" mr-3" :src="'/storage/' + user.image" alt="">
              </div>
              <div class="box-info">

                <h6>Categoria</h6>
                <p class="text-info"> {{user.categories[0].name}} </p>
                <h6>Skills principali</h6>
                <p class="text-info"> {{user.skills[0].name}} </p>
                        
              </div>       
          </div>

          <div class="right-box">
              <div class="user-info">
                <h3 class="my-3 text-warning">{{user.name}}</h3>
                <p> {{user.city}} </p>
                <h5>Panoramica</h5>
                  <div class="box-description">
                      <p class="font-italic"> {{user.description_job}} </p>
                  </div>
              </div>
      
              <router-link :to="{ name:'profile/', params:{user: user, slug: user.slug}}">
                <button class="btn btn-freelance m-4">Vai al profilo</button>
              </router-link>
          </div>
      </div>  
  </div>
  <div class="d-flex justify-content-center h-100" v-else>
    <div id="loading-bar-spinner" class="spinner"><div class="spinner-icon"></div></div>
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

.text-orange{
  color: rgb(235, 143, 38);
}

 .box-profile{
   margin: 10px; 
   width: 330px;
   height: 400px;
   border-radius: 20px;
   overflow: hidden;
   background-color: #f3f3f3;
   box-shadow: 5px 10px 18px #888888;
   
     .left-box{
       padding: 10px;
       width: 40%;
       height: 100%;
      //  border-right: 1px solid #5DADEC;
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
           margin-top: 15px;
         }
     }
     .right-box{
       padding: 10px;
       width: 60%;
       height: 100%;
      //  background-color: #1a3854ab;
       background-color: #1B3952;
      //  background-color: #7373FC;

       color:white;
         .user-info{
           width: 100%;
           height: 80%;
             .box-description{
                font-size: 13px;
                height: 60%;
                width: 100%;
                overflow: hidden;
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
#loading-bar-spinner.spinner {
    left: 50%;
    margin-left: -20px;
    top: 50%;
    margin-top: -20px;
    position: absolute;
    z-index: 19 !important;
    animation: loading-bar-spinner 400ms linear infinite;
}

#loading-bar-spinner.spinner .spinner-icon {
    width: 40px;
    height: 40px;
    border:  solid 4px transparent;
    border-top-color:  #00C8B1 !important;
    border-left-color: #00C8B1 !important;
    border-radius: 50%;
}

@keyframes loading-bar-spinner {
  0%   { transform: rotate(0deg);   transform: rotate(0deg); }
  100% { transform: rotate(360deg); transform: rotate(360deg); }
}
</style>