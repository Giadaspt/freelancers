<template>

 <div class="jumbotron d-flex flex-column align-items-center justify-content-center">
  <div class="container ">

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
          <button class="btn btn-jumbo ml-3 " type="submit">
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
  
  min-height: 60vh;
  background-image: url('../img/jumbo.png');
  background-size: cover;
  background-repeat: no-repeat;
   margin-bottom: 0;
   @media (max-width: 900px) {
    background-color: #EBF2F8;
    background-image: none;
  }

     h1{
       font-size: 5vw;
       margin-bottom: 25px;
       color: #5165F6;
     }
}

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