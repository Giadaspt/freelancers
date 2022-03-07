<template>
<div class="container">
  
  <div class="search-container my-2">
      <router-link :to=" {name:'HomePage'} " > <i class="fas fa-arrow-circle-left"></i> </router-link>
    <h1 class="mb-4 mt-4">Seleziona una categoria</h1>
      
         
         <button class="btn btn-info" v-for="category in categories"
           :key="`category${category.id}`"
              @click="$emit('getUserCategory', category.slug )"
           > {{ category.name }} </button>
  
   </div>
  </div>
</template> 

<script>

export default {
  name: "Search",

  props: {
    'categories':Array,
    'skills':Array,
    // 'modelValue': String
  },

}
</script>

<style lang="scss" scoped>

.search-container{
   width: 100%;
  //  height: 300px;
     i{
       font-size: 20px;
     }
     h1{
       color: #1A3854;
     }
     button{
       width: calc(100% / 6 - 10px);
       height: 120px;
       margin: 5px;
      //  box-shadow: 5px 10px 18px #888888;
       border-radius: 10px;
       color: white;
       background-color: #5165F6;      
       border: none;
          &:hover{
            background-color: #2b5175;
          }
     }
}

</style>