<template>
  <div class="container d-flex flex-column">
    <div class="d-flex align-items-center ">
      <div class=" mr-3" >
        <img class=" mr-3" :src="'/storage/' + user.image" :alt="user.name">
        <!-- <a :href="'/storage/' + user.image" data-lightbox="image" ></a> -->
      </div>
      <h3 class="mr-2">{{ user.name }}</h3>
      <h3>{{ user.lastname }}</h3>
    </div>

    <div class="mt-3" >
      <h5>{{ user.email }}</h5>
        
      <h5>{{ user.address }}</h5>
      <h5>{{ user.city }}</h5>


      <div class="mt-3 mb-3">
        <h5 class="mr-2 font-weight-bold" v-if="user.description_job != null">Me ed il mio lavoro </h5>
        <p>{{ user.description_job }}</p>
      </div>
    </div>

    <div class=" mr-3" >
      <!-- <embed width="500" height="375" frameborder="0" class="cv-custom mr-3" :src="'/storage/' + user.cv" :alt="user.name"> -->
      <!-- <object :data="'/storage/' + user.cv" type="file" data-active-view="true"></object> -->
      <!-- <a style="width:500 height:375 "   :href="'/storage/' + user.cv"></a>  -->
      <iframe style="width: 200px; height: 350px;"  :src="'/storage/' + user.cv"></iframe>
    </div>

    <section class="mt-4 mb-4">
      <h3>Contattami</h3>

      <form method="POST" @submit.prevent="sendForm" >
        
        <div class="form-group">
          <label for="email_sender" class="ml-2">Email</label>
          <input v-model="email_sender" type="email" class="form-control" id="email_sender" placeholder="Scrivi la tua email" required>
          <small id="emailHelp" class="form-text text-muted">La tua email sarà visibile solo al professionista che stai contattando</small>
        </div>

        <div class="form-group">
          <label for="name_sender" class="ml-2">Nome</label>
          <input v-model="name_sender" type="text" class="form-control" id="name_sender" placeholder="Nome" required>
        </div>

        <div class="form-group">
          <label for="text">Scrivi il tuo messaggio</label>
          <textarea v-model="text" class="form-control" id="text" rows="3" required ></textarea>
        </div>

        <section class="d-flex justify-content-between">
          <div class="d-flex">
            <button type="submit" class="btn btn-freelance mr-3">Invia</button>
            <button type="reset" class="btn btn-delete">Cancella</button>
          </div>
          <div class="back  mb-4">
            <a class="btn-freelance btn-back d-flex justify-content-center" @click="$router.go(-1)">Indietro</a>
          </div>
        </section>

        <section >
          <h3>Recensioni</h3>

          
        </section>

    </form>
    </section>

  </div>
</template>

<script>

export default {
  name: "ProfilePage",

  data(){
    return {
      apiUrl: 'http://127.0.0.1:8000/api/',
      users: [],
      user: '',
      slug: this.$route.params.slug,

  
      name_sender: '',
      email_sender: '',
      text: '',
      errors:{},
      success: false,
      sending: false,
    }
  }, 

  mounted() {
    this.getUser();
  }, 


  methods: {

    getUser(){
      axios.get(this.apiUrl)
        .then(res => {
          this.users = res.data.users;

          let userOk = this.users.find(item => item.id );

          // console.log('user',this.users);
          // console.log('res data',res.data.users);
          // console.log('user ok', userOk);

          this.user = userOk;

          return this.user;
      });
    },  
    
    // lightBox(){
    //   return lightbox.option({
    //     'resizeDuration': 200,
    //     'wrapAround': true
    //   })
    // },

     sendForm(){
        this.sending = true;
  
        axios.post("http://127.0.0.1:8000/api/message/", {

          name_sender: this.name_sender,
          email_sender: this.email_sender,
          text: this.text,
          user: this.user
          
          })
          .then((res) => {

          // this.message = res.data.message;

          this.sending = false;

          console.log(res.data);

          if(res.data.errors){
            this.errors = res.data.errors;

          } else {
   
            this.errors = {};
            this.name_sender = '',
            this.email_sender = '',
            this.text = '',
            this.success = true
          }

         

        }).catch((err) => {
          console.log(err);
        });
      },

      reset(){
        this.errors = {};
        this.name_sender = '',
        this.email_sender = '',
        this.text = '',
        this.success = true
      }

  }
}
</script>

<style scoped lang="scss">

.cv-custom {
  width: 30%;
  overflow-y: none;
  overflow-x: none;

  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
}

.back{
  width: 90px;
  height: 20px;
  text-align: center;
  cursor: pointer;

  .btn-back {
    padding: 4px;
  }
}


</style>