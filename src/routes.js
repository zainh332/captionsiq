import { createRouter, createWebHistory } from 'vue-router';
import ResetPassword from './components/ResetPassword.vue';
import signin from './components/signin.vue';
import store from './store';
import Collection from './views/Collection.vue';
import HomeView from './views/Home.vue';
import Package from './views/Package.vue';
import Support from './views/Support.vue';
import profile from './views/profile.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      meta: { guest: true },
    },
    {
      path: '/collection',
      name: 'Collection',
      component: Collection,
      meta: { guest: true },
    },
    {
      path: '/profile',
      name: 'profile',
      component: profile,
      meta: { requiresAuth: true }
    },
    {
      path: '/packages',
      name: 'Package',
      component: Package,
      meta: { guest: true },
    },
    {
      path: '/contact_us',
      name: 'contact_us',
      component: Support,
      meta: { guest: true },
    },
    {
      path: '/terms&condition',
      name: 'terms&condition',
      component: Package,
       meta: { guest: true },
    },
    {
      path: '/signin',
      name: 'signin',
      component: signin,
    },
    {
      path: '/password-reset/:token',
      name: 'password-reset',
      component: ResetPassword,
      meta: { guest: true },
    },
    
  ]
})

router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.requiresAuth)) {
    if (store.getters.isAuthenticated) {
      next();
      return;
    }
    next("/");
  } else {
    next();
  }
});

export default router
