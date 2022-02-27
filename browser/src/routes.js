import VueRouter from 'vue-router';

import ShowPost from './pages/Post/ShowPost.vue';
import IndexPost from './pages/Post/IndexPost.vue';

const PostContext = [
    { path: '/posts', component: IndexPost },
    { path: '/posts/:id', component: ShowPost }
];

import Home from './pages/Home.vue';
import Project from './pages/Project.vue';
import Contact from './pages/Contact.vue';

const NavContext = [
    { path: '/', component: Home },
    { path: '/projects', component: Project },
    { path: '/contact', component: Contact }
]

export default new VueRouter({
    mode: 'history',
    routes: [
        ...NavContext,
        ...PostContext,
    ]
});