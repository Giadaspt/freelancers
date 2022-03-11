<template>

<div class="box-register d-flex justify-content-center align-items-center flex-row">
    <div class="opaco">
      <div class="box-text-register text-center container ">
        <h2>Sei un freelancer?</h2>
        <p>Iscriviti <br> e raggiungi i tuoi clienti</p>

          <button @click="register" class="btn btn-register btn-success">Iscriviti</button>

      </div>
    </div>
    


</div>
 
</template>

<script>
export default {
  name: "Register",

   methods: {
            register() {
                axios.post('/register')
                    .finally( err => {
                        window.location.href = '/register';
                    })
            },
        }
}


</script>

<style lang="scss" scoped>

 .box-register{
   width: 100%;
   background-color: #EBEBEB;
   background-image: url(https://img.freepik.com/free-photo/top-view-person-writing-laptop-with-copy-space_23-2148708035.jpg?w=1480);
   background-repeat: no-repeat;
   background-size: auto;
        button{
          width: 200px;
          height: 60px;
          font-size: 20px;
          border-radius: 10px;
        }
   
    .opaco{
      width: 100%;
      height: 100%;
      padding: 120px 0;
      background-color: black;
      opacity: 0.5;
      
    }
     .box-text-register{
       height: 100%;
      //  padding: 80px;
      //  background-color:rgb(137, 189, 167);
      color: white;
         h2{
        font-weight: 700;
        font-size: 40px;
        }
        p{
          font-weight: 600;
          font-size: 40px;
        }
         a{
           text-decoration: none;
           color: white;
         }
     }
}

</style>