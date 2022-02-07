import Vue from 'vue'
import VueRouter from 'vue-router'
import Main from './pages/Main.vue'

import routes from './routes.js';

Vue.use(VueRouter);

new Vue({
  el: '#app',
  router: routes,
  render: h => h(Main)
});