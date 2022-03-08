<template>
  <div class="container d-flex flex-column">
    <div class=" mr-3">
      <img class=" mr-3" :src="'/storage/' + user.image" :alt="user.name">
      <!-- <a :href="'/storage/' + user.image" data-lightbox="image" ></a> -->
    </div>

    <div class="mt-3" >
      <h5>{{ user.name }}</h5>
      <h5>{{ user.lastname }}</h5>
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
      <iframe   :src="'/storage/' + user.cv"></iframe>
    </div>

    <section class="mt-4 mb-4">
      <h3>Contattami</h3>
      <form>
      <div class="form-group">
        <label for="exampleInputEmail1" class="ml-2">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Scrivi la tua email" required>
        <small id="emailHelp" class="form-text text-muted">La tua email sarà visibile solo al professionista che stai contattando</small>
      </div>
      <div class="form-group">
        <label for="name" class="ml-2">Nome</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nome" required>
      </div>
      <div class="form-group">
        <label for="lastname" class="ml-2">Cognome</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Cognome" required>
      </div>
      <div class="form-group">
        <label for="description_job">Scrivi il tuo messaggio</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required ></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Invia</button>
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

          console.log('user',this.users);
          console.log('res data',res.data.users);
          console.log('user ok', userOk);

          this.user = userOk;

          return this.user;
      });
    },  
    
    lightBox(){
      return lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
      })
    }

  }
}
</script>

<style scoped lang="scss">

.cv-custom {
  width: 30%;
  overflow: none;

  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
}



</style>