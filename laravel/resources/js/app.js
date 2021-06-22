/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/App1');
window.Vue = require('vue')
import Vuex from 'vuex'
import storeVuex from './store/index'
import filter from './filter'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)
Vue.use(Vuex)
Vue.component('main-app', require('./components/MainApp.vue').default);
const store = new Vuex.Store(storeVuex)
const chatapp = new Vue({
    el: '#chatapp',
    store
});
