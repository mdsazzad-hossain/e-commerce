require('./bootstrap');

window.Vue = require('vue');


Vue.component('home-search', require('./components/homeSearchBar.vue').default);

const app = new Vue({
    el: '#app',
});
