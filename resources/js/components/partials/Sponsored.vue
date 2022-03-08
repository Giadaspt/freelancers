<template>
<div class="my-5">
<h2>Freelancer in evidenza</h2> 
<div class="box-sponsored d-flex justify-content-center">
   
   <Profile
     v-for="(i, index) in 3" :key="index"
   />


</div>
 </div>
</template>

<script>
import Profile from './Profile.vue'
export default {
  name: "Sponsored",

  components:{
    Profile
  },

  methods:{

  }
}


</script>

<style lang="scss" scoped>

 .box-sponsored{
   width: 100%;
  //  height: 400px;
}

</style>