require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.$routes = {
    scenarios: 'scenarios',
    dbSize: 'db-size',
    scenario: 'scenario',
    snapshotAll: 'scenarios/snapshot'
};

Vue.prototype.$apiBaseUri = window.apiBaseUri;

Vue.component('last-snapshots', require('./components/LastSnapshots.vue').default);
Vue.component('btn-snapshot-all', require('./components/SnapshotAllButton.vue').default);

const app = new Vue({
    el:'#app'
});
