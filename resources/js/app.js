
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/*import VueRouter from "vue-router"

const routes = [
    {
        path: "/home",            
        component: require("./components/Home.vue")
    },
    {
        path: "/estado",            
        component: require("./components/Estado.vue")
    },
    {
        path: "/pais",            
        component: require("./components/Pais.vue")
    },
    {
        path: "/usuario",
        component: require("./components/Usuarios.vue")
    }
]

const router = VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes
})*/


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

Vue.component('estado', require('./components/Estado.vue').default);
Vue.component('pais', require('./components/Pais.vue').default);
Vue.component('usuario', require('./components/Usuarios.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',     
    //router
});
