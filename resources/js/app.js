/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from "vue";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// axios instance
import axios from 'axios'
import VueSweetalert2 from 'vue-sweetalert2';
//import { ModalPlugin } from 'bootstrap-vue';
import BootstrapVue from 'bootstrap-vue';
import 'sweetalert2/dist/sweetalert2.min.css';
import 'bootstrap-vue/dist/bootstrap-vue.css'


// Laravel CSRF token
let token = document.head.querySelector('meta[name="csrf-token"]');

// Create an Instance
const instance = axios.create({
    // change this url to your api
    baseURL: window.location.origin,

    // any other headers you want to include
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': token ? token.content : null,
        'Accepts': 'application/json'
    }
});
Vue.use(VueSweetalert2);
Vue.use(BootstrapVue);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('stock-items-container', require('./components/Stocks/StockItemsContainer.vue').default);
Vue.component('invoice', require('./components/invoices/Invoice').default)
Vue.component('barcode-input', require('./components/barcode/BarcodeInputComponent').default);
Vue.component('search-item', require('./components/items/SearchItemComponent').default)
Vue.component('invoice-container', require('./components/invoices/InvoiceContainer').default)
Vue.component('products-container', require('./components/invoices/ProductsContainer').default)
Vue.component('sell-main-container', require('./components/sell/MainContainer').default)

Vue.component('image-input', require('./components/widgets/ImageInputComponent').default)
Vue.component('auto-complete-text-input', require('./components/widgets/form/AutoCompleteTextInputComponent').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

/*if ("serviceWorker" in navigator) {
    window.addEventListener("load", function() {
        navigator.serviceWorker
            .register("/serviceWorker.js")
            .then(res => console.log("service worker registered"))
            .catch(err => console.log("service worker not registered", err))
    })
}*/

