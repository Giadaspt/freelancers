<template>
  <div>
    <Jumbotron/>
    <div class="bg-home">
     <Categories/>
    </div>
    <div class="container">
     <Sponsored/>
    </div>
    
    <div class="bg-home">
      <div class="">


     <HowItWorks/>

     <Network/>

     <AboutUs/>
      </div>
    </div>

     <Register/>

    
    <Footer/>

  </div>
</template>

<script>
import Jumbotron from '../partials/Jumbotron.vue'
import Categories from '../partials/Categories.vue'
import Sponsored from '../partials/Sponsored.vue'
import HowItWorks from '../partials/HowItWorks.vue'
import Network from '../partials/Network.vue'
import AboutUs from '../partials/AboutUs.vue'
import Register from '../partials/Register.vue'
import Footer from '../partials/Footer.vue'

export default {
  name: "HomePage",

  components:{
    Jumbotron,
    Categories,
    Sponsored,
    HowItWorks,
    Network,
    AboutUs,
    Register,
    Footer
  }
}


</script>

<style>
  .bg-home{
    background-color: #5DADEC;
    width: 100%!important;
    color: white;
  }
  .container-custom{
    width: 80%;
    padding: auto 0;
  }

</style>