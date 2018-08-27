
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
//window.$ = window.jQuery = require('jquery');

window.Vue = require('vue');
//import Vue from 'vue/dist/vue.js';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

var frontApp = new Vue({
    el: '#frontApp',
    data: {
      message: 'You loaded this page on: ' + new Date().toLocaleString()
      , hannna: window.hannna
      ,current_year: new Date().getFullYear() + "!!!"
    }
});