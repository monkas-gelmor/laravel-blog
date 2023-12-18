import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';
import router from './router'

import PostIndex from "@/components/post/PostIndex.vue";

createApp({
    components: {
        PostIndex
    }
}).use(router).mount('#app')
