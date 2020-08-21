require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.$routes = {
    scenarios: 'scenarios',
    dbSize: 'db-size',
    scenario: 'scenario',
    snapshotAllowedOnly: 'scenarios/snapshot',
    snapshotAll: 'scenarios/snapshot/all',
};

Vue.prototype.$apiBaseUri = window.apiBaseUri;

Vue.component('last-snapshots', require('./components/LastSnapshots.vue').default);
Vue.component('btn-snapshot-all', require('./components/SnapshotAllButton.vue').default);
Vue.component('scenario', require('./components/Scenario.vue').default);
Vue.component('scenario-chart', require('./components/ScenarioChart.vue').default);
Vue.component('snapshot-scenario-btn', require('./components/SnapshotScenarioButton.vue').default);
Vue.component('de-activate-scenario-btn', require('./components/SwitchScenarioActivationButton').default);
Vue.component('scenario-details', require('./components/ScenarioDetails').default);

const app = new Vue({
    el:'#app'
});
