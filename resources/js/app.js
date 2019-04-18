import './bootstrap';
import Vue from 'vue';

import Clock from './components/Clock';
import Number from './components/Number';
import TopTeams from './components/TopTeams';
import PoweredBy from './components/PoweredBy';

Vue.component('clock', Clock);
Vue.component('number', Number);
Vue.component('top-teams', TopTeams);
Vue.component('powered-by', PoweredBy);

const app = new Vue({
    el: '#app'
});
