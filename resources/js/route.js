import Home from "@/components/pages/Home.vue";
import Posts from "@/components/pages/Posts.vue";
import Post from "@/components/pages/Post.vue";
import NotFound from "@/components/pages/NotFound.vue";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'blog',
        path: '/blog',
        component: Posts
    },
    {
        path: '/blog/:post',
        name: 'blog-post',
        component: Post
    },
    {
        path: "/:catchAll(.*)",
        component: NotFound,
    },
]
