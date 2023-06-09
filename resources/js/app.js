/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { createApp } from 'vue';
import Pay from './components/Pay.vue';
import Navbar from './components/Navbar.vue';
import ErrorBanner from './components/ErrorBanner.vue';
import StatusBanner from './components/StatusBanner.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page.
 */
const app = createApp({
    components:{
       Pay,
       Navbar,
       ErrorBanner,
       StatusBanner,
    }
});
app.mount("#app");