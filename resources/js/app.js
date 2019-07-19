/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// import home from './Home.vue';
// import Vue from 'vue';
// import Router from 'vue-router';
// import home from './Home'
Vue.component('home',  require('./Home.vue').default);
Vue.component('example', require('./components/ExampleComponent'));
Vue.component('infinitytecnico', require('./components/infinitePosts').default);


// import DashboardPlugin from '@/plugins/blackDashboard'
// Vue.use(DashboardPlugin);
// import App from './App.vue';

// Vue.component('example', require('./components/ExampleComponent.vue'));

const routes = [
    {
        name: 'Home',
        path: './',
        component: require('./Home.vue').default
    },
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(
    {
        el: '#app'
    }

).$mount('#app');


Pusher.logToConsole = true;

var pusher = new Pusher('b482df66d9836d1f97b5', {
    cluster: 'mt1',
    forceTLS: true
});

var channel = pusher.subscribe('my-channel');
channel.bind('formSender', function(data) {
    if (!Notification) {
        alert('Desktop notifications not available in your browser. Try Chrome.');
        return;
    }

    if (Notification.permission !== "granted")Notification.requestPermission();


    else {
        var notification = new Notification(data.title, {
            icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
            body: data.body
        });
        //@todo: Ativiar o onClick. Ele não lê o númro do chamado

        notification.onclick = function () {
            window.open('/adminPainel');
        };

    }
});

