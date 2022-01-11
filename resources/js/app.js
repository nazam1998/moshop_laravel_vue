require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Vue = require('vue');
import Vue from 'vue';
import vuetify from './vuetify';
import router from './router';
Vue.component('home', require('./components/Home.vue').default);
Vue.component('register', require('./components/Register.vue').default);
Vue.component('login', require('./components/Login.vue').default);
Vue.component('dashboard', require('./components/Dashboard.vue').default);
Vue.component('edit-profil', require('./components/EditProfil.vue').default);
Vue.component('my-shop', require('./components/MyShop.vue').default);
Vue.component('add-product', require('./components/AddProduct.vue').default);
Vue.component('edit-product', require('./components/EditProduct.vue').default);
Vue.component('cart', require('./components/Cart.vue').default);
Vue.component('orders', require('./components/Orders.vue').default);

const app = new Vue({
    el: '#app',
    vuetify,
    router
});
