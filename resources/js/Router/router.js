import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/auth/LoginComponent';

const routes = [
    { path: '/login', component: Login },
]

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history'
})

export default router;