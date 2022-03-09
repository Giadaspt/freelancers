<template>

<footer>
 <div class="container container-footer-box d-flex">

     <div class="footer-box d-flex align-items-center">
       <ul>
         <li> <strong>BFreelance</strong> </li>
         <a href="#"><li>Chi siamo/ Contatti </li></a> 
         <a href="#"><li> Stampa </li></a> 
         <a href="#"><li> Termini di servizio </li></a> 
         <a href="#"><li> Informativa privacy </li></a> 
         <a href="#"><li> Recensioni </li></a> 
       </ul>
     </div>
     <div class="footer-box d-flex align-items-center">
       <ul>
         <li><strong>Come funziona</strong></li>
        <a href="#"><li> Cerco un professionista </li></a> 
        <a href="#"><li> Sono un professionista </li></a> 
        <a href="#"><li> Domande frequenti </li></a> 
        <a href="#"><li> Guida per freelancerList </li></a> 
        <a href="#"><li> Trova lavori per freelance </li></a>
       </ul>
        

     </div>
     <div class="footer-box d-flex align-items-center">
       <ul>
         <li><strong>Blog</strong></li>
        <a href="#"><li> Come fare un portfolio: 3 software per essere efficaci online </li></a> 
        <a href="#"><li> Fare content mktg nel 2022: idee da usare subito </li></a> 
        <a href="#"><li> Perché fare il Web Developer freelance nel 2022 è vincente </li></a> 
       </ul>

      
     </div>
   

 </div>

 <div class="bottom-footer">
   <div class="container d-flex justify-content-between">
    <p>Copyright ©2022 BFreelancer - Spark Technology S.r.l. P.IVA 04578412</p> 

    <div class="box-social">
  
    </div>
   </div>
 </div>
    

</footer>
 
</template>

<script>
export default {
  name: "Footer",

  methods:{

  }
}


</script>

<style lang="scss" scoped>

 footer{
   color: white;
   width: 100%;
   height: 250px;
   background-color: rgb(0, 0, 0);
    .container-footer-box{
      height: 100%;
        li{
          list-style: none;
        }

        a{
          text-decoration: none;
          color: white;
        }

        
    }
     .footer-box{
       width: calc(100% / 3);
       height: 100%;
     }

     .bottom-footer{
          
          width: 100%;
          background-color: rgb(0, 0, 0);
          color: white;
         
        }
}

</style>