<template>
<div class="container">

  <!-- <h1> {{user}} </h1> -->

    <div class="side d-flex flex-wrap row">
      <!-- section of profile details -->
      <section class="left-side" >
          <div class="d-flex align-items-center" >
            <div class="profile-image mr-3">
              <img class=" mr-3" :src="'/storage/' + user.image" alt="">
            </div>
            <h3 class="mr-2">{{ user.name }}</h3>
            <h3>{{ user.lastname }}</h3>
          </div>

          <div class="mt-3" >
            <h5>{{ user.email }}</h5>

            <h5>{{ user.address }}</h5>
            <h5>{{ user.city }}</h5>

            <div class="mt-3 mb-3 mr-4">
              <h5 class="mr-2 font-weight-bold" v-if="user.description_job != null">Me ed il mio lavoro </h5>
              <p>{{ user.description_job }}</p>
            </div>

            <div class="left-side ">
                  <h5 class="mr-2 font-weight-bold">Mi occupo di: </h5>

                <span class=" cat">
                  <p class="mr-2" v-for="category in userComplete.categories" :key="`${category.id}`">
                      {{ category.name }},
                  </p>
                </span>
              </div>

              <div class="left-side " >
                  <h5 class="mr-2 font-weight-bold">I miei punti di forza sono: </h5>
                  <span class="skill">
                    <p class="mr-2" v-for="skill in userComplete.skills" :key="`${skill.id}`">
                      {{ skill.name }},
                    </p>
                  </span>
                </div>
             
              <div class="box-img mr-3 cv" >
                  <!-- <embed width="500" height="375" frameborder="0" class="cv-custom mr-3" :src="'/storage/' + user.cv" :alt="user.name"> -->
                  <!-- <object :data="'/storage/' + user.cv" type="file" data-active-view="true"></object> -->
                  <!-- <a style="width:500 height:375 "   :href="'/storage/' + user.cv"></a>  -->
                  <iframe class="curriculum"  style="width:200 height:375 " :src="'/storage/' + user.cv"></iframe>
                  <!-- <img class="curriculum"   :src="'/storage/' + user.cv"> -->
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
            <input v-model="name_sender" type="text" class="form-control" id="name_sender" placeholder="Scrivi il tuo nome" required>
          </div>

          <div class="form-group">
            <label for="text">Scrivi il tuo messaggio</label>
            <textarea v-model="text" class="form-control" id="text" rows="3" required ></textarea>
          </div>


            <div class="d-flex">
              <button @click="alertDisplayMess()" type="submit" class="btn btn-freelance mr-3" >Invia</button>
              <button type="reset" class="btn btn-delete">Cancella</button>
            </div>
        </form>
      </section>
    </div>

    <!-- reviews section -->
    <section class="reviews-section">
      <h3>Recensioni</h3>

      <div class="cust-review d-flex mr-3">
        <div class="card row cust-card-review mb-4 mr-4"  v-for="review in userReviews" :key="review.id">
          <div class="card-body p-0" >
            <div class="top"></div>
              
              <h3 class="card-title d-flex align-items-center ml-4 mb-0  mt-3" >{{review.author_name}}</h3>
              <div class="stars ml-4 mr-3  d-flex">
                  <span 
                    class="starGraphic"
                    v-for="(i, index) in review.vote" :key="`${index}`">
                    ★
                  </span>
              </div>
              <p class="card-text ml-4 mr-3 mb-3">{{review.text}}</p>
          </div>
        </div>
      </div>

      <form method="POST" @submit.prevent="sendFormReview" class="mb-4">

        <div class="form-group">
          <label for="author_name" class="ml-2">Nome</label>
          <input v-model="author_name" type="text" class="form-control" id="author_name" placeholder="Nome" required>
        </div>

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
            <button @click="alertDisplayRev()" type="submit" class="btn btn-freelance mr-3 mb-3">Invia</button>
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
// import Review from '../partials/Review.vue';

export default {
  name: "ProfilePage",

  // components: {
  //   Review,
  // },

  data(){
    return {
      apiUrl: 'http://127.0.0.1:8000/api/',
      users: [],
      user: this.$route.params.user,
      categories: [],
      skills: [],

      reviews: [],
      author_name: '',
      vote: 0,

      name_sender: '',
      email_sender: '',
      text: '',
      errors:{},
      success: false,
      sending: false,


      userCategory: [],
      userComplete: {},
      userReviews: [],
    }
  },

  mounted() {
    // console.log('user singolo',this.user);
    // console.log('user tanti',this.users);
    // console.log('user cati',this.userCategory);
    // console.log('reviews vai',this.reviews);
    // console.log('reviews yes',this.review);

    // console.log('cat cat',this.category);

    this.getApi();
    this.getAllCat();
    this.getCategories();
   
    
     this.getAllRev();
  },

  methods: {
    getApi(){
      axios.get(this.apiUrl )
        .then(res => {

          this.users = res.data.users;

          let userObj= this.users;

          userObj.forEach(utente =>{
            if(utente.id === this.user.id){
              return this.userComplete = utente;
            }

          });
            // console.log('user complete',this.userComplete);
            // console.log('userObj', userObj);

          // console.log('reviw user', this.users );
      });
    },

    getAllCat(){

      axios.get(this.apiUrl)
        .then(res => {
          this.categories = res.data.categories;

          // console.log('cat cat',this.categories);
      });
    },

    getCategories(){
      let cat = this.categories;
      cat.forEach(category => {

        if(category.id = this.user.pivot.category_id){
          console.log('array pivot cat.id',category.id);
          return this.userCategory.push(category.name)
        }
      });

        // console.log('array cat',cat);
        // console.log('array cat2',this.userCategory);
        // console.log('array pivot',this.user.pivot.category_id);

    },

    getAllRev(){

      axios.get(this.apiUrl)
        .then(res => {
          this.reviews = res.data.reviews;
          this.getReviews();

          console.log('all reviews',this.reviews);
      });

      
    },

     getReviews(){
        let rev = [];
        rev = this.reviews;
        console.log('tutti i rev',rev);

        rev.forEach(rec => {
          console.log('una review', rec);
          console.log('review.id', rec.id);

          if(rec.user_id == this.user.id){
            
            console.log('id dello user che ha la recensione',rec.user_id); 
            return this.userReviews.push(rec);
          }
        });

        
        console.log('i reviews dello user',this.userReviews);
        console.log('user.id',this.user.id);
     

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

      alertDisplayMess() {
        // $swal function calls SweetAlert into the application with the specified configuration.
        if(this.success = true){
          this.$swal('Messaggio inviato', 'il tuo messaggio è stato inviato correttamente', 'OK');
        } else {
          this.success = false;
        }
      },

      alertDisplayRev() {
        // $swal function calls SweetAlert into the application with the specified configuration.
        if(this.success = true){
          this.$swal('Grazie', 'la tua recensione è stata invata correttamente', 'OK');
        } else {
          this.success = false;
        }
      }

  }
}
</script>

<style scoped lang="scss">

   .box-img{
     width: 250px;
     height: 350px;
        img{
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
     
   }

</style>
