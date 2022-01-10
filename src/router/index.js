import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Subscribers from '../views/Subscribers.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/subscribers',
    name: 'Subscribers',
    component: Subscribers
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
