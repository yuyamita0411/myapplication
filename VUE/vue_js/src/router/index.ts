import { createRouter, createWebHistory, RouteRecordRaw} from 'vue-router'
import HomeView from '../views/HomeView.vue'
import loginView from '../views/Login.vue'
import ForgotPassView from '../views/ForgotPass.vue'
import RegisterView from '../views/Register.vue'
//import dashboardView from '../views/Dashboard.vue'
import AfterLoginView from '../views/AfterLogin.vue'
//import Store from '@/store/index.js';
import DashboardView from '@/components/AfterLogin/Dashboard.vue';
import ScheduleView from '@/components/AfterLogin/SchedulePage.vue';
import GroupInfoView from '@/components/AfterLogin/GroupInfo.vue';
import TaskInfoView from '@/components/AfterLogin/TaskInfoView.vue';
import TaskDetailView from '@/components/AfterLogin/TaskDetail.vue';
import ManageUserView from '@/components/AfterLogin/ManageUser.vue';

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    redirect: '/login',
    name: 'home',
    component: HomeView
  },
  {
    path: '/login',
    name: 'Login',
    component: loginView,
    meta: { title: 'Gware', desc: 'use gware tool' }
  },
  {
    path: '/password/forgot',
    name: 'ForgotPass',
    component: ForgotPassView,
    meta: { title: 'Gware', desc: 'use gware tool' }
  },
  {
    path: '/register',
    name: 'Register',
    component: RegisterView,
    meta: { title: 'Gware', desc: 'use gware tool' }
  },
  {
    path: '/dashboard',
    name: 'AfterLogin',
    component: AfterLoginView,
    children: [
      {
        path: '/dashboard',
        name: 'Dashboard',
        component: DashboardView,
      },
      {
        path: '/schedule',
        name: 'Schedule',
        component: ScheduleView,
      },
      /*{
        path: '/groupinfo',
        name: 'Groupinfo',
        component: GroupInfoView,
      },*/
      {
        path: '/taskinfo',
        name: 'Taskinfo',
        component: TaskInfoView,
      },
      {
        path: '/taskdetail/:id',
        name: 'TaskDetail',
        component: TaskDetailView,
      },
      {
        path: '/manageuser',
        name: 'ManageUser',
        component: ManageUserView,
      }
    ],
    meta: {
      isAuthenticated: true,
    }
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
/*
router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.isAuthenticated)) {
    if (!Store.state.auth.isAuth) {
      next({ name: 'Login' });
    } else {
      next();
    }
  }
  next();
});
*/
export default router
