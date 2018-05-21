
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from 'vue';
import Router from 'vue-router';

Vue.config.devtools = true;
Vue.use(Router);

let router = new Router({
   routes : [
          {
            path :'/',
            component : require('./components/generales/Cargos')
          }
   ],
   linkExactActiveClass: 'active',
});

Vue.component('produndmedidas'     , require('./components/productos/ProdUndMedidas.vue'));
Vue.component('cargos'             , require('./components/generales/Cargos.vue'));
Vue.component('lineas'             , require('./components/generales/Lineas.vue'));

const VueApp = new Vue({

    el: '#VueApp',
    router
});







