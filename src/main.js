import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './routes.js' 
import store from './store';
import axios from 'axios';

axios.defaults.withCredentials = true;
const baseURL = 'http://captionsiq.test/api/';
axios.defaults.baseURL = baseURL;


axios.interceptors.response.use(undefined, function (error) {
  if (error) {
    const originalRequest = error.config;
    if (error.response.status === 401 && !originalRequest._retry) {
  
        originalRequest._retry = true;
        store.dispatch('LogOut')
        return router.push('/')
    }
  }
})

// createApp(App).use({router,store}).mount('#app')
createApp(App)
  .use(store)
  .use(router)
  .mount('#app');