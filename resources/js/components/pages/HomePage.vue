<template>
  <div>
    <Jumbotron/>
    <div class="container">
    
     <Categories/>

     <Sponsored/>

    </div>
     <HowItWorks/>

     <Network/>

     <AboutUs/>

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


</style>