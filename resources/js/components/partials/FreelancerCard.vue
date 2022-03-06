<template>

    <!-- <img :src="freelancerCard.image" alt=""> -->

    <div class="card my-3">
      <div class="card-body">
        <h5 class="card-title">
          <span><h3>{{ freelancerCard.name }} {{ freelancerCard.lastname }}</h3></span>
          <!-- <span><h3>{{ freelancerCard.lastname }}</h3></span> -->
        </h5>
        <p class="card-text">{{ freelancerCard.city }}</p>
        <div class="box-img"> <img :src="'storage/'+freelancerCard.image" alt="image"> </div>
        
        <!-- <div class="container-categories">
            <p v-for="(category, index) in freelancerCard.categories" :key="index"> {{category.name}} </p>
        </div> -->

        <div class="container-description my-2">
           <p class="card-text">{{ freelancerCard.description_job }}</p>
        </div>
        
        
        <!-- <a href="#" class="btn btn-primary">Vai al profilo</a> -->
       <button class="btn btn-success">
         <router-link :to=" {name:'profile', params:{slug: freelancerCard.slug}} " > Vai al profilo </router-link>
      </button>
      </div>
    </div>

</template>

<script>
export default {
  name: "FreelancerCard",

  props: {
    "freelancerCard": Object,
  },

  // data(){
  //   return {
  //      categories: []
  //   }
  // }
}
</script>

<style scoped lang="scss">

   .card{
      box-shadow: 5px 10px 18px #888888;
      border-radius: 10px;
      margin: 10px;
      width: calc(100% / 3 - 20px);
      height: 400px;
       .container-categories{
         height: 25%;
         overflow: auto;
         border: 1px solid lightgray;
            p{
          margin: 5px;
          font-size: 13px;
        }
       }
       .container-description{
         height: 25%;
         overflow: auto;
       }
      
      // display: inline-block !important;
     a{
      //  background-color: #28b623d0;      
       border: none;
       color: white;
       text-decoration: none;
     }  

     .box-img{
       width: 100px;
       height: 100px;
         img{
           width: 100%;
           height: 100%;
           object-fit: cover;
         }
     }
    
   }

</style>