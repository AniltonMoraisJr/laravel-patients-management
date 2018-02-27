
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router'
import VueTheMask from 'vue-the-mask'
import VeeValidate from 'vee-validate'


window.Vue = require('vue');

Vue.use(VueRouter)
Vue.use(require('vue-moment'))
Vue.use(VeeValidate)
Vue.use(VueTheMask)

import App from './components/AppComponent'
import Home from './components/HomeComponent'
import Patients from './components/patients/PatientsComponent'
import NewPatient from './components/patients/NewPatientComponent';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/admin/home',
            name: 'home',
            component: Home
        },
        {
            path: '/admin/patients',
            name: 'patients',
            component: Patients,
            children:[
            ]
        },
        {
            path: '/admin/patients/create',
            name: 'new_patient',
            component: NewPatient,
        }
        
    ],    
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
