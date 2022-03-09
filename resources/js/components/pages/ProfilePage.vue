<template>
<div class="container">

    <div class="side d-flex flex-wrap row">
      <!-- section of profile details -->
      <section class="left-side" >
          <div class="d-flex align-items-center" >
            <div class="profile-image mr-3">
              <img class=" mr-3" :src="'/storage/' + user.image" :alt="user.name">
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

            <div class="left-side ">
                  <h5 class="mr-2 font-weight-bold">Mi occupo di: </h5>
                <span class=" cat">
                  <p class="mr-2" v-for="category in user.categories" :key="`${category.id}`">
                      {{ category.name }},
                  </p>
                </span>  
              </div>
        
              <div class="left-side ">
                  <h5 class="mr-2 font-weight-bold">I miei punti di forza sono: </h5>
                  <span class="skill">
                    <p class="mr-2" v-for="skill in skills" :key="`${skill.id}`">
                      {{ skill.name }},
                    </p>
                  </span>
                </div>
              <div class="mr-3 cv" >
                  <!-- <embed width="500" height="375" frameborder="0" class="cv-custom mr-3" :src="'/storage/' + user.cv" :alt="user.name"> -->
                  <!-- <object :data="'/storage/' + user.cv" type="file" data-active-view="true"></object> -->
                  <!-- <a style="width:500 height:375 "   :href="'/storage/' + user.cv"></a>  -->
                  <iframe class="curriculum"   :src="'/storage/' + user.cv"></iframe>
              </div>
          </div>
      </section>

      <!-- form per inviare messaggi -->
      <section class="mt-4 mb-4 right-side">
        <h3>Contattami</h3>

        <form method="POST" @submit.prevent="sendFormMessage" >
          
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

        
            <div class="d-flex">
              <button type="submit" class="btn btn-freelance mr-3">Invia</button>
              <button type="reset" class="btn btn-delete">Cancella</button>
            </div>
        </form>
      </section>
    </div>

    <!-- reviews section -->
    <section class="reviews-section">
      <h3>Recensioni</h3>
      <div>
        <h2>Qua ci vanno le recensioni stampate</h2>
        <!-- qua vanno stamapte le recensioni -->
      </div>

      
      <form method="POST" @submit.prevent="sendFormReview" class="mb-4">

        <div class="form-group">
          <label for="author_name" class="ml-2">Nome</label>
          <input v-model="author_name" type="text" class="form-control" id="author_name" placeholder="Nome" required>
        </div>

        <!-- <div class="form-group">
          <label for="vote" class="ml-2">Voto</label>
          <input v-model="vote" type="number" min="1" max="5"  class="form-control" id="vote" placeholder="Voto" required>
          <small id="emailHelp" class="form-text text-muted">Inserisci un voto da 1 a 5</small>
        </div> -->

        <p>Inserisci un voto da 1 a 5</p>
        <form class="rating" required>
          <label>
            <input type="radio" name="vote" value="1" v-model="vote"/>
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="vote" value="2" v-model="vote"/>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="vote" value="3" v-model="vote"/>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>   
          </label>
          <label>
            <input type="radio" name="vote" value="4" v-model="vote"/>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="vote" value="5" v-model="vote"/>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
        </form>

        <div class="form-group">
          <label for="text">Scrivi il tuo messaggio</label>
          <textarea v-model="text" class="form-control" id="text" rows="3"></textarea>
        </div>

        <div class="d-flex justify-content-between">
          <div class="">
            <button type="submit" class="btn btn-freelance mr-3 mb-3">Invia</button>
            <button type="reset" class="btn btn-delete ">Cancella</button>
          </div>
          <div class="back mt-4 mb-4">
            <a class="btn-freelance btn-back justify-content-center" @click="$router.go(-1)">Indietro</a>
          </div>
        </div>
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
      user: this.$route.params.user,
      slug: this.$route.params.slug,

      categories: [], 
      skills: [],
  
      name_sender: '',
      email_sender: '',
      text: '',
      errors:{},
      success: false,
      sending: false,

      author_name: '',
      vote: 0,
    }
  }, 

  mounted() {
    this.getUser();
    console.log('user singolo',this.user);
    console.log('user tanti',this.users);
  }, 

  methods: {
    getUser(){
      axios.get(this.apiUrl, )
        .then(res => {
          this.users = res.data.users;
          this.categories = res.data.category;
          this.skills = res.data.skills; 
          
          // console.log(this.user);
           let userOk = this.users;

          // userOk.forEach(user => {
          //   console.log(user);
            
          // });

          // let userOk = this.users.find(item => item.id);

          // console.log('user',this.users);
          // console.log('res data',res.data.users);
          console.log('user ok', userOk);

          // this.user = userOk;
          
      });
    },  
    
     sendFormMessage(){
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

     sendFormReview(){
        this.sending = true;
  
        axios.post("http://127.0.0.1:8000/api/review/", {
          author_name: this.author_name,
          vote: this.vote,
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
            this.author_name = '',
            this.vote = 0,
            this.text = '',
            this.success = true
          }
         
        }).catch((err) => {
          console.log(err);
        });
      },

      change() {
        console.log('New star rating: ' + this.value);
      },

  }
}
</script>

<style scoped lang="scss">

</style>
