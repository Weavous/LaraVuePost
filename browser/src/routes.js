import VueRouter from 'vue-router';

import Comment from './pages/Comment.vue';
import Post from './pages/Post.vue';
import Reply from './pages/Reply.vue';

export default new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: Post },
        { path: '/posts', component: Post },
        { path: '/posts/:id', component: Comment },
        { path: '/comments/:id', component: Reply }
    ]
});