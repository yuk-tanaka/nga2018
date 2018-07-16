/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * load global libraries
 */

//bootstrap-vue
import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);

//chartkick
//import Chart from 'chart.js';
//import VueChartkick from 'vue-chartkick';
//Vue.use(VueChartkick, {adapter: Chart});

//element-ui
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/ja';
Vue.use(ElementUI, {locale});

//font-awesome
require('@fortawesome/fontawesome');
require('@fortawesome/fontawesome-free-solid');
//require('@fortawesome/fontawesome-free-regular');
require('@fortawesome/fontawesome-free-brands');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('app-shop', require('./components/AppShop.vue'));
Vue.component('app-shop-detail', require('./components/AppShopDetail.vue'));
Vue.component('app-favorite', require('./components/AppFavorite.vue'));
Vue.component('app-shop-nearby-current', require('./components/AppShopNearbyCurrent.vue'));

const app = new Vue({
  el: '#app'
});
