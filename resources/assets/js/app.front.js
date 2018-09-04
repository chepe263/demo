
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
Vue.component('example-component', require('./compiled_components/components/ExampleComponent.vue'));

var frontApp = new Vue({
    el: '#frontApp',
    data: {
        hannna: window.hannna
      , current_year: new Date().getFullYear()  
      , add_to_card_items: 1
      , adding_cart_items: false
      , added_to_cart: false
    }
    ,methods:{
      add_to_cart:function(e){
        const url = e.target.action;
        var self = this;
        if(self.adding_cart_items){
          return;
        }
        self.adding_cart_items = true;
        self.added_to_cart = false;
        /*try {
          const response = await axios.get(url)
          //this.posts = response.data
          console.log(response.data);
        } catch (e) {
          this.errors.push(e)
        }*/
        var res =  axios.post(url,{
            quantity: self.add_to_card_items            
          })
          .then(response =>{
            self.hannna.cart.itemCount += self.add_to_card_items;
            self.add_to_card_items = 1;
            self.adding_cart_items = false;
            self.added_to_cart = true;
            setTimeout(function() {
              self.added_to_cart = false;
            }, 1000);
          } );
         
      }
    }
});