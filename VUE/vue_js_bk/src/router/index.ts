import { createRouter, createWebHistory } from 'vue-router'
//import HomeView from '../views/HomeView.vue'
import loginView from '../views/Login.vue'
import ForgotPassView from '../views/ForgotPass.vue'
import RegisterView from '../views/Register.vue'
import dashboardView from '../views/Dashboard.vue'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/login',
    name: 'Login',
    component: loginView
  },
  {
    path: '/password/forgot',
    name: 'ForgotPass',
    component: ForgotPassView
  },
  {
    path: '/register',
    name: 'Register',
    component: RegisterView
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: dashboardView
  }/*,
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',*/
//    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
//  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
