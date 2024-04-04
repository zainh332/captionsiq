import { createRouter, createWebHistory } from 'vue-router'
import HomeView from './views/Home.vue';
import Collection from './views/Collection.vue';
import profile from './views/profile.vue';
import Support from './views/Support.vue';
import Package from './views/Package.vue';
import signin from './components/signin.vue';
import ForgotPassword from './components/ForgotPassword.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/collection',
      name: 'Collection',
      component: Collection
    },
    {
      path: '/profile',
      name: 'profile',
      component: profile
    },
    {
      path: '/packages',
      name: 'Package',
      component: Package
    },
    {
      path: '/contact_us',
      name: 'contact_us',
      component: Support
    },
    {
      path: '/terms&condition',
      name: 'terms&condition',
      component: Package
    },
    {
      path: '/signin',
      name: 'signin',
      component: signin
    },
    {
      path: '/forgot-password',
      name: 'forgotPassword',
      component: ForgotPassword
    },
  ]
})

export default router
