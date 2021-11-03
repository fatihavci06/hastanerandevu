/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueMask from 'v-mask';

window.Vue = require('vue').default;
Vue.use(VueMask);
Vue.use(require('vue-resource'));
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('randevu-component', require('./components/RandevuComponent.vue').default);
Vue.component('admingelecekrandevu-component', require('./components/adminrandevuComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('adminbugunrandevu-component', require('./components/adminbugunrandevuComponent.vue').default);
Vue.component('adminlastrandevu-component', require('./components/adminlastComponent.vue').default);
Vue.component('adminbekleyenrandevu-component', require('./components/adminbekleyenrandevuComponent.vue').default);
Vue.component('adminiptalrandevu-component', require('./components/adminiptalComponent.vue').default);
Vue.component('admincalismasaatleri-component', require('./components/admincalismasaatleriComponent.vue').default);
Vue.component('admincalismasaatleriitem-component', require('./components/admincalismasaatitemComponent.vue').default);
Vue.component('randevudetay-component', require('./components/RandevuDetayComponent.vue').default);
Vue.component('hastarandevudetay-component', require('./components/HastaRandevuComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
