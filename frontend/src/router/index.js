import { createRouter, createWebHistory } from 'vue-router'
import Login from '../views/LoginView.vue'
import Register from '../views/RegisterView.vue'
import Profile from '../views/ProfileView.vue'
import Setpassword from '../views/SetPasswordView.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    // {
    //   path: '/',
    //   name: 'home',
    //   component: HomeView
    // },

    {
      path: '/login',
      name: 'login',
      component: Login
    },

    {
      path: '/setpassword/:token',
      name: 'setpassword',
      component: Setpassword,
      meta: { requiresAuth: true },
    },

    {
      path: '/profile/:token/:method',
      name: 'profile',
      component: Profile,
       meta: { requiresAuth: true },
    },

    {
      path: '/register',
      name: 'register',
      component: Register
    },

  ]
})




router.beforeEach((to, from, next) => {
  const isAuthenticated = !!localStorage.getItem('token'); 

  if (to.meta.requiresAuth && !isAuthenticated) {
    next({ name: 'login' });
  } else {
    next(); 
  }
});

export default router
