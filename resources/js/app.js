
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import moment from 'moment';
window.Vue = require('vue');

//Pra los errores del formulario
import { Form, HasError, AlertError } from 'vform'

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


//Sweet alet2
import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.toast = toast;


//QR vue
import Vue from "vue";
import VueQrcodeReader from "vue-qrcode-reader";

Vue.use(VueQrcodeReader);


//Pagination 
Vue.component('pagination', require('laravel-vue-pagination'));

//Vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

 

//vue progress bar
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '3px'
})


let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },   
    { path: '/users', component: require('./components/Users.vue').default }, 
    { path: '/qrusers', component: require('./components/Qruser.vue').default }, 
    { path: '/qrvehis', component: require('./components/Qrvehi.vue').default }, 
    { path: '/developer', component: require('./components/Developer.vue').default }, 
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/android', component: require('./components/Android.vue').default },
    { path: '/manual', component: require('./components/Guide.vue').default },
    { path: '/targets', component: require('./components/Target.vue').default },
    { path: '/qrshow', component: require('./components/Qrshow.vue').default },
    { path: '/smsmen', component: require('./components/Message.vue').default }, 
    { path: '/messages/:id', component: require('./components/Mostrar.vue').default }, 
    { path: '/notificaciones', component: require('./components/Notificaciones.vue').default }, 
    { path: '*', component: require('./components/Notfound.vue').default }, 

  ]

const router = new VueRouter({
	mode: 'history',
	routes
})

//Filtros/**
Vue.filter('upText', function(text){
  return text.charAt(0).toUpperCase() + text.slice(1);
});

Vue.filter('myDate', function(created){
  return moment(created).locale("es").format('MMMM Do YYYY');
});

Vue.filter('myHour', function(created){
  return moment(created).locale("es").format('LLL');
});
 
window.Fire = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('notifications', require('./components/Notifications.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Laravel Passport
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

const app = new Vue({
    el: '#app',
    router,
    data: {
        search:''
    },
    methods:{
      searchit: _.debounce(()=> {
          Fire.$emit('searching');
      },1000) 
    }
});
