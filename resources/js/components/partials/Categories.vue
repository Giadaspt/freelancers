<template>

<div class="box-categories">
  <div class="search-container my-2">
     
    <h1 class="mb-4 mt-4">Seleziona una categoria</h1>
      
         
         <button class="btn btn-info btn-category" v-for="(category, index) in categories"
           :key="index"  
           > {{ category }} </button>
  
   </div>
   


</div>
 
</template>

<script>
export default {
  name: "Categories",

   data(){
    return {
      categories: ['Support Specialist', 'Computer Programmer', 'Graphic Designer', 'Software Developer', 'Web Developer', 'Systems Analyst', 'Network Engineer', 'User Experience Designer', 'Database administrator', 'Software Engineer', 'It Security Specialist', 'Data Scientist']
    }
  },

  methods:{

  }
}


</script>

<style lang="scss" scoped>

 .box-categories{
   width: 100%;
   height: 400px;
     .btn-category{
       margin: 10px;
       width: calc(100% / 6 - 20px);
       height: 100px;

     }
}

</style>