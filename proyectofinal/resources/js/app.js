require('./bootstrap');

import Vue from 'vue'
import VueMqtt from 'vue-mqtt'
import LineCharts from './components/LineCharts';
import MqttComponent from './components/MqttComponent';

window.Vue = require('vue');
Vue.use(VueMqtt, 'ws://localhost:9001', {clientId: 'WebClient-' + parseInt(Math.random() * 100000)})
Vue.config.productionTip = false

Vue.component('line-chart',  LineCharts);
Vue.component('mqtt-component',  MqttComponent);


const app = new Vue({
    el: '#app'
});