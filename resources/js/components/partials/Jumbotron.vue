<template>

 <div class="jumbotron">
  <div class="container text-center d-flex flex-column align-items-center">

       <h1> Assumi i migliori freelancers online </h1>

     


    <div class="input-group mb-3 input">

      <input 
      type="text" 
      v-model="category"
      class="form-control input-jumbo" 
      placeholder="Cerca il tuo freelancers" >

      <div class="input-group-append ">
        <router-link :to="{ path:'freelancerList/' + this.category, params:{name: this.name}}"  > 
        <!-- :to="{ name:'freelancerList'}" -->
        <!-- this.slug -->
          <button class="btn btn-jumbo ml-5 " type="submit">
            Cerca 
          </button>
        </router-link>
      </div> 
     </div>
    </div>
    
  </div>
  
</template>

<script>
export default {
  name: "Jumbotron",

  data(){
    return{
      category: "",

      name: this.$route.params.name,
    }
  },

  methods:{

  }
}


</script>

<style lang="scss" scoped>

 .jumbotron{
   width: 100%;
  min-height: 600px;
  //  background-color: rgb(202, 219, 219);
  background-image: url('../img/jumbo.png');
  background-size: cover;
  background-repeat: no-repeat;
   margin-bottom: 0;
     h1{
       font-size: 5vw;
       margin-bottom: 25px;
       color: #5165F6;
     }
}
.btn-jumbo{
  background-color: #5165F6;
  color: white;
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