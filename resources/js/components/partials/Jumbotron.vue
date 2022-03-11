<template>

 <div class="jumbotron">
  <div class="container d-flex flex-column align-items-center">
     <div class="box-title">
        <h1> <strong>Assumi i migliori freelancers online</strong>  </h1>
     </div>
      
      <div class="input-group mb-3 input">

        <input 
        type="text" 
        v-model="category"
        class="form-control input-jumbo" 
        placeholder="Cerca il tuo freelancers"  >
        <!-- @keypress="searchCat" -->

        <div class="input-group-append ">
          <!-- <router-link :to="{ path:'freelancerList/' + this.category, params:{name: this.name}}"  >  -->
          <router-link :to="{ path:'freelancerList/' + this.category, params:{name: this.name}}"  > 
            <a class="btn btn-jumbo ml-3 " >
              Cerca 
            </a>
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
      apiUrl: 'http://127.0.0.1:8000/api/',

      users: [],

      category: "",

      name: this.$route.params.name,

      okSearch: true,
    }
  },

  mounted(){
    this.getCategory(this.name);

    console.log('vediamo cosa sei', this.name);
  },

  computed: {
    
  },

  methods:{
    getCategory(name){

      axios.get(this.apiUrl + 'categories/' + name)
      .then(res =>{
        this.users = res.data.category.users;
       
        console.log('user della chiamata',this.users);

      });
    },

    searchCat(){
      console.log('users in search', this.users);
      let users = this.users;

      // users.forEach(user => {
      //   console.log('user.name', user.name);
      //   return user.name;
      // })
    

      // this.category = this.name;
      // console.log('search name cat', this.name);
      console.log('search', this.category);
      console.log('user della chiamata',users);
      console.log('cat splitatta', this.category.split(""));

       let catSearch = this.category.split("");

      // this.category.split("") = this.name.split("")

      users.forEach(cat => { 

        if(this.category.split("") == this.name.split("") && this.category === this.name){
          this.okSearch = true;
          return cat.name.toLowerCase().includes(this.name.toLowerCase()) ;
        } else {
          this.okSearch = false;
        }
       
      });

      console.log('search cat after loop', this.category);
      console.log('search name cat after loop', this.name);
      console.log('user della chiamata after loop',users);
    },

      


  }
}


</script>

<style lang="scss" scoped>

 .jumbotron{

  min-height: 55vh;
  // background-image: url('../img/jumbo.png');
  background-image: url('../img/jumbo4.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
   margin-bottom: 0;
   @media (max-width: 900px) {
    background-color: #EBF2F8;
    background-image: none;
  }

     h1{
       font-size: 5vw;
       margin-bottom: 25px;
       color: #1B3952;
     }

     .box-title{
     width: 800px;
    //  height: 300px;
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