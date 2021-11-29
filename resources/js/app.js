require('./bootstrap');

window.Vue = require('vue').default;
import Vuetify from 'vuetify'

Vue.use(Vuetify)

Vue.component('app-home', require('./components/AppHome.vue').default);

import router from './Router/router.js';
import User from './Helper/User';

window.User = User;
window.EventBus = new Vue();

const app = new Vue({
    el: '#app',
    vuetify : new Vuetify(),
    router
});
