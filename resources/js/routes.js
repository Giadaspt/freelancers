import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from './components/HomePage';
import FreelancerList from './components/pages/FreelancerList';
import Profile from './components/Profile';

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
      path: '/freelancerList',
      name: 'freelancerList',
      component: FreelancerList,
    },
    {
      path: '/profile/:slug',
      name: 'profile',
      component: Profile
    },
  ]
});

export default router;