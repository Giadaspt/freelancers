<template>

<div class="box-profile d-flex">
    
   <div class="left-box">
       <div class="box-img"></div>
       <div class="box-info"></div>
   </div>


   <div class="right-box">
       <div class="user-info">

       </div>

       <div class="box-buttons d-flex justify-content-center">
         <button class="btn-profile">Vedi</button>
         <button class="btn-profile">Contatta</button>
       </div>
   </div>


</div>
 
</template>

<script>
export default {
  name: "Profile",

  methods:{

  }
}


</script>

<style lang="scss" scoped>

 .box-profile{
   padding: 10px;
  //  width: calc(100% / 3);
   width: 350px;
   height: 400px;
     .left-box{
       padding: 10px;
       width: 40%;
       height: 100%;
       background-color: coral;
         .box-img{
           width: 100%;
           height: 120px;
           background-color: darkturquoise;
           border-radius: 50%;
           overflow: hidden;
             img{
               width: 100%;
               object-fit: cover;
             }
         }

         .box-info{
           width: 100%;
         }
     }
     .right-box{
       padding: 10px;
       width: 60%;
       height: 100%;
       background-color: rgb(150, 255, 80);
         .user-info{
           width: 100%;
           height: 85%;
           background-color: indianred;
         }

         .box-buttons{
             padding: 10px;
              .btn-profile {
                width: 100px !important;
                margin: 7px;
                padding: 7px;
                background-color: rgb(45, 190, 45);
                border: none;
                border-radius: 10px;
                color: white;
                  &:hover{
                    background-color: rgb(100, 204, 100);
                  }
              }
         }

        
     }
}

</style>