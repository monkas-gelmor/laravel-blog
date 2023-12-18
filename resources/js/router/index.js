import { createRouter, createWebHistory } from 'vue-router'
import PostIndex from "@/components/post/PostIndex.vue";
import PostCreate from "@/components/post/PostCreate.vue";
import PostEdit from "@/components/post/PostEdit.vue";

export const routes = [
    {
        path: '/dashboard',
        name: 'post.index',
        component: PostIndex,
    },
    {
        path: '/post/create',
        name: 'post.create',
        component: PostCreate,
    },
    {
        path: '/post/:id/edit',
        name: 'post.edit',
        component: PostEdit,
        props: true,
    },
]

export default createRouter({
    mode: 'history',
    history: createWebHistory(),
    routes
})
