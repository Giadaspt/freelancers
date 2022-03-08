<template>

<div class="box-categories">
  <h2 class="text-center my-5">Seleziona una categoria</h2>        
  <div class="d-flex justify-content-center align-content-center flex-wrap">

    <div class="d-flex justify-content-between row" >
    <!-- <router-link  :to="{ path:'freelancerList/' + this.category, params:{name: category.name}}" > -->

      <!-- <button class="btn btn-category btn-info" type="submit" v-for="(category, index) in categories"  
        :key="index"  
        > {{ category.name }} 
      </button> -->
 
      
        <a class="card dash-card text-center col-3 btn-category" v-for="(category, index) in categories" :key="index" :href="'freelancerList/'+ category.name">{{category.name}}</a>
      
        <!-- <button class="btn btn-category btn-info" type="submit" 
        :key="index"  
        </button> -->
        <!-- {{ category.name }}  -->
    <!-- </router-link>  -->
    </div>

   
  </div>
 
</div>
</template>

<script>
export default {
  name: "Categories",

   data(){
    return {
      // categories: ['Support Specialist', 'Computer Programmer', 'Graphic Designer', 'Software Developer', 'Web Developer', 'Systems Analyst', 'Network Engineer', 'User Experience Designer', 'Database administrator', 'Software Engineer', 'It Security Specialist', 'Data Scientist'],

      apiUrl: 'http://127.0.0.1:8000/api/',

      category:"",

      categories:[],

      name:this.$route.params.name
    }

  },

  methods:{

     getCategory(){

      axios.get(this.apiUrl)
      .then(res =>{
        this.categories = res.data.categories;

        // let cat = this.categories.find(item => item.name);
        // this.category = cat;
       
        
        console.log('user della chiamata',this.categories);
        console.log(res.data.categories);
        console.log(this.category);
        // return this.category

      });
    },
  },

  mounted(){
    this.getCategory()
  }
  }



</script>

<style lang="scss" scoped>

//  .box-categories{
//    width: 100%;
//    padding: 50px 0 50px 0;
//   //  height: 350px;
//      .btn-category{
//        border-radius: 10px;
//        text-transform: uppercase;
//        width: calc(100% / 6 - 20px);
//        width: 164px;
//        height: 100px;
//       //  background-color: #5165F6;
//        color: white;
//          &:hover{
//             // background-color: #6b7add;
//          }

//      }
// }

.box-categories{
  padding: 100px 0;

  .btn-category{
    padding: 25px;
    height: 100px;
    margin: 15px;
    
  }
}

</style>