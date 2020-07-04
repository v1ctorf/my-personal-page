require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('last-snapshots', require('./components/LastSnapshots.vue').default);

const app = new Vue({
    el:'#app'
});
