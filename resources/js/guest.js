
window.axios = require('axios');
window.Vue = require('vue');

import AOS from 'aos'
import 'aos/dist/aos.css'

import Vue from 'vue'

import App from './App.vue';

import router from './routes';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);

const app = new Vue({

   created () {
    AOS.init()
 },

  el: '#app',

  router,

  render: h=>h(App),

});
