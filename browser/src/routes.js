import VueRouter from 'vue-router';

import Post from './pages/Post.vue';

export default new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: Post },
        { path: "/posts", component: Post }
    ]
});