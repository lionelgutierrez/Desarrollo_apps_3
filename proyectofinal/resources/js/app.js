require('./bootstrap');

import Vue from 'vue'
import VueMqtt from 'vue-mqtt'
import LineCharts from './components/LineCharts';

window.Vue = require('vue');

Vue.component('line-chart',  LineCharts);

Vue.config.productionTip = false

const app = new Vue({
    el: '#app'
});