<template>
  <div class="container">
    <div class="card custom-card row">
      <div class="card-body p-0">
        <div class="top"></div>
        <h5 class="card-title d-flex align-items-center p-4">
          <div class="profile-image">
            <img :src="'/storage/' + freelancerCard.image" alt="">
          </div>
          <h3 class="name ml-4 mr-3">{{ freelancerCard.name }} {{ freelancerCard.lastname }}</h3>
        
          <!-- <span><h3 class="name">{{ freelancerCard.pivot.categories[0] }}</h3></span> -->
        </h5>
         <p class="name ml-4">{{ freelancerCard.city }} </p>
        <p class="card-text pl-4 pr-4">{{ freelancerCard.description_job }}</p>

        <router-link :to="{ name:'profile/', params:{user: freelancerCard, slug: freelancerCard.slug}}">
          <!-- <button class="btn btn-info text-white m-4">Vai al profilo</button> -->
           <a class="btn btn-jumbo m-3 " >
              Vai al profilo
            </a>
          
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "FreelancerCard",

  props: {
    "freelancerCard": Object,
  },

  data(){
    return{
 
    }
  },

  mounted(){

    console.log('freelancer',this.freelancerCard);
  }

}
</script>

<style scoped lang="scss">

.btn-jumbo {
display: inline-block;
border-radius: 10rem;
color: #fff;
transition: all .3s;
position: relative;
overflow: hidden;
z-index: 1;
&:after {
content: '';
position: absolute;
bottom: 0;
left: 0;
width: 100%;
height: 100%;
background-color: #0cf;
border-radius: 10rem;
z-index: -2;
}
&:before {
content: '';
position: absolute;
bottom: 0;
left: 0;
width: 0%;
height: 100%;
background-color: darken(#0cf, 15%);
transition: all .3s;
border-radius: 10rem;
z-index: -1;
}
&:hover {
color: #fff;
&:before {
width: 100%;
}
}
}


.input{
  width: 80% !important;
}

.input-jumbo{
  &:hover{
    box-shadow: 0px 0px 18px;
  }
}
  
</style>
