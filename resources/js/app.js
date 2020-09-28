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

Vue.component('last-snapshots', require('./components/projects/arbitrage/LastSnapshots.vue').default);
Vue.component('btn-snapshot-all', require('./components/projects/arbitrage/SnapshotAllButton.vue').default);
Vue.component('scenario', require('./components/projects/arbitrage/Scenario.vue').default);
Vue.component('scenario-chart', require('./components/projects/arbitrage/ScenarioChart.vue').default);
Vue.component('snapshot-scenario-btn', require('./components/projects/arbitrage/SnapshotScenarioButton.vue').default);
Vue.component('de-activate-scenario-btn', require('./components/projects/arbitrage/SwitchScenarioActivationButton').default);
Vue.component('scenario-details', require('./components/projects/arbitrage/ScenarioDetails').default);
Vue.component('scenario-steps', require('./components/projects/arbitrage/ScenarioSteps').default);
Vue.component('scenario-step-trade', require('./components/projects/arbitrage/ScenarioStepTrade').default);
Vue.component('scenario-step-transfer', require('./components/projects/arbitrage/ScenarioStepTransfer').default);
Vue.component('scenario-history', require('./components/projects/arbitrage/ScenarioHistory').default);

Vue.component('welcome-footer', require('./components/welcome/Footer').default);
Vue.component('footer-icon', require('./components/welcome/FooterIcon').default);
Vue.component('welcome-masthead', require('./components/welcome/Masthead').default);
Vue.component('skills-chart', require('./components/welcome/SkillsChart').default);

const app = new Vue({
    el:'#app'
});
