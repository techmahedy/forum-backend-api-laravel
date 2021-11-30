import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/auth/LoginComponent';
import Forum from '../components/forum/ForumComponent';
import Logout from '../components/auth/LogoutComponent';
import single from '../components/forum/questions/SingleQuestionComponent'
import askquestion from '../components/forum/questions/AskQuestionComponent'

const routes = [
    { path: '/login', name: 'login', component: Login },
    { path: '/forum', name: 'forum', component: Forum },
    { path: '/logout', name: 'logout', component: Logout },
    { path: '/question/:slug', name: 'question', component: single },
    { path: '/create/question', name: 'createque', component: askquestion },
]

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history'
})

export default router;