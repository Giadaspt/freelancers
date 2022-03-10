
window.axios = require('axios');
window.Vue = require('vue');

import Vue from 'vue'

import App from './App.vue';

import router from './routes';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);

const app = new Vue({
  el: '#app',

  router,

  render: h=>h(App),

});
