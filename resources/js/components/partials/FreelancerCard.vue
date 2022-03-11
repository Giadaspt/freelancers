<template>
  <div class="container">
    <div class="card custom-card row">
      <div class="card-body p-0">
        <div class="top"></div>
        <h5 class="card-title d-flex align-items-center p-4">
          <div class="profile-image">
            <img :src="'/storage/' + freelancerCard.image" alt="">
          </div>
          <span><h3 class="name ml-4 mr-3">{{ freelancerCard.name }}</h3></span>
          <span><h3 class="name">{{ freelancerCard.lastname }}</h3></span>
        </h5>
        <p class="card-text pl-4 pr-4">{{ freelancerCard.description_job }}</p>

        <router-link :to="{ name:'profile/', params:{user: freelancerCard, slug: freelancerCard.slug}}">
          <button class="btn btn-freelance m-4">Vai al profilo</button>
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
  
</style>
