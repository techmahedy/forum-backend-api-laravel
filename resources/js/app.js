require('./bootstrap');

window.Vue = require('vue').default;
import Vuetify from 'vuetify'

Vue.use(Vuetify)

Vue.component('app-home', require('./components/AppHome.vue').default);

import router from './Router/router.js';
import Helper from './Helper/Helper';

window.Helper = Helper;

const app = new Vue({
    el: '#app',
    vuetify : new Vuetify(),
    router
});
