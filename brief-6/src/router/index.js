import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home'
import Login from '../views/login'
import Register from '../views/Register'
import Dashboard from '../views/Dashboard.vue'
import MyRdv from "../views/MyRdv";
const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  }, {
  path: '/login',
    name:'login',
    component: Login
  },
  {
    path:'/register',
    name:'Register',
    component: Register
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard
  },
  {
    path: '/MyRdv',
    name: 'MyRdv',
    component: MyRdv
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
