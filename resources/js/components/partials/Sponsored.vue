<template>

<div class="box-sponsored d-flex">
    
   <Profile
     v-for="(i, index) in 3" :key="index"
   />


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
   height: 400px;
}

</style>