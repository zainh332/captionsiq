import { createRouter, createWebHistory } from 'vue-router'
import HomeView from './views/Home.vue';
import Collection from './views/Collection.vue';
import profile from './views/profile.vue';
import Support from './views/Support.vue';
import Package from './views/Package.vue';
import signin from './components/signin.vue';
import ForgotPassword from './components/ForgotPassword.vue';
import store from './store';

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
      path: '/forgot-password',
      name: 'forgotPassword',
      component: ForgotPassword
    },
  ]
})


// function checkIfUserIsLoggedIn() {
//   // Check if the user is logged in by verifying if a token or authentication information exists in localStorage
//   const token = localStorage.getItem('token'); // Assuming you store a token upon successful login
//   return !!token; // If token exists, return true, otherwise return false
// }

// router.beforeEach((to, from, next) => {
//   console.log(to,from,next);
//   // Check if the route requires authentication
//   if (to.matched.some(record => record.meta.requiresAuth)) {
//     console.log('Entering');
//     // Check if user is logged in (you'll need your own authentication logic)
//     const isLoggedIn = checkIfUserIsLoggedIn(); // Replace with your actual check
//     if (!isLoggedIn) {
//       console.log(isLoggedIn);
//       // User is not logged in, redirect to login page
//       next('/');
//     } else {
//       // User is logged in, allow navigation to proceed
//       next();
//     }
//   } else {
//     console.log('Not Entering');
//     // Route does not require authentication, allow navigation to proceed
//     next();
//   }
// });

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

// router.beforeEach((to, from, next) => {
//   if (to.matched.some((record) => record.meta.guest)) {
//     if (store.getters.isAuthenticated) {
//       next("/");
//       return;
//     }
//     next();
//   } else {
//     next();
//   }
// });


export default router
