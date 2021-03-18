require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.$routes = {};

Vue.component('welcome-footer', require('./components/welcome/Footer').default);
Vue.component('footer-icon', require('./components/welcome/FooterIcon').default);
Vue.component('welcome-masthead', require('./components/welcome/Masthead').default);
Vue.component('skills-chart', require('./components/welcome/SkillsChart').default);
Vue.component('welcome-navbar', require('./components/welcome/Navbar').default);
Vue.component('about-section', require('./components/welcome/AboutSection').default);

const app = new Vue({
    el:'#app'
});
