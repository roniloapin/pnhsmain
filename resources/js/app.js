/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('admin-lte');


window.Vue = require('vue').default;
import moment from 'moment';
import { Form, HasError, AlertError } from 'vform'
import Vue from 'vue';
import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);


import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'center',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    didOpen: (Toast) => {
      Toast.addEventListener('mouseenter', Swal.stopTimer)
      Toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  window.Toast = Toast;

window.Form = Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.component('pagination', require('laravel-vue-pagination'));

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '4px'
  })

let routes = [
    { path: '/academic', component: require('./components/Academic.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/studentprofile', component: require('./components/StudentProfile.vue').default },
    { path: '/teacherprofile', component: require('./components/TeacherProfile.vue').default },
    { path: '/students', component: require('./components/Students.vue').default },
    { path: '/teachers', component: require('./components/Teachers.vue').default },
    { path: '/subjects', component: require('./components/Subjects.vue').default },
    { path: '*', component: require('./components/NotFound.vue').default },
  ]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

Vue.filter('capitalize',function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
});

Vue.filter('myDate', function(created){
    return moment(created).format('l, h:mm a');
});

window.fire = new Vue();
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component(
  'not-found',
  require('./components/NotFound.vue').default
);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    data:{
      search: ''
    },
    methods:{
      searchit: _.debounce(()=>{
        fire.$emit('searching');
      }, 1000),

      printme() {
        window.print();
      }
    },
});
