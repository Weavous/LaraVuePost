import Vue from 'vue'
import VueRouter from 'vue-router'
import Post from './pages/Post.vue'

import routes from './routes.js';

Vue.use(VueRouter);

new Vue({
  el: '#app',
  router: routes,
  render: h => h(Post)
});