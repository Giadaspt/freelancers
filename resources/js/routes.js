import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from './components/pages/HomePage';
import FreelancerList from './components/pages/FreelancerList';
import ProfilePage from './components/pages/ProfilePage';

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
      path: '/freelancerList/:name',
      name: 'freelancerList/',
      component: FreelancerList,
    },
    {
      path: '/profile/:slug',
      name: 'profile/',
      component: ProfilePage,
    },
    {
      path: '*',
      name: 'error',
      component: Error,
    },
  ]
});

export default router;