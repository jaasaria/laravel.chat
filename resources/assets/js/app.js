
require('./bootstrap');


Vue.component('example', require('./components/Example.vue'));
Vue.component('noti', require('./components/Noti.vue'));

import { store } from './store'

const app = new Vue({
    el: '#app',
    store
});
