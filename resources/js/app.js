require('./bootstrap');

window.Vue = require('vue');

Vue.component('home-search', require('./components/homeSearchBar.vue').default);
Vue.component('load-product', require('./components/load-product.vue').default);
Vue.component('search-result', require('./components/search-result.vue').default);

const app = new Vue({
    el: '#app',
});