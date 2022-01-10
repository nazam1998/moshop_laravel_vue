require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
require('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue';
import vuetify from './vuetify';
import router from './router';
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('register', require('./components/Register.vue').default);
Vue.component('login', require('./components/Login.vue').default);
Vue.component('dashboard', require('./components/Dashboard.vue').default);
Vue.component('edit-profil', require('./components/EditProfil.vue').default);

const app = new Vue({
    el: '#app',
    vuetify,
    router
});
