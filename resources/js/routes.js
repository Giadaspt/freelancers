import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from './components/pages/HomePage';
import FreelancerList from './components/pages/FreelancerList';

const router = new VueRouter({

  mode: 'history',

  linkActiveClass: 'active',

  routes: [
    {
      path: '/',
      name: 'homepage',
      component: HomePage,
    },
    {
      path: '/freelancerList/:slug',
      name: 'freelancerList',
      component: FreelancerList,
    },
  ]
});

export default router;