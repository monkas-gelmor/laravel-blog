import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

export default function usePosts() {
    const post = ref([]);
    const posts = ref([]);

    const errors = ref('');
    const router = useRouter();

    const getPosts = async () => {
        let response = await axios.get('/api/post');
        posts.value = response.data.data;
    }

    const getPost = async (id) => {
        let response = await axios.get(`/api/post/${id}`);
        post.value = response.data.data;
    }

    const storePost = async (data) => {
        errors.value = '';
        try {
            await axios.post('/api/post', data);
            await router.push({ name: 'post.index' });
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors;
                }
            }
        }
    }

    const updatePost = async (id) => {
        errors.value = '';
        try {
            await axios.patch(`/api/post/${id}`, post.value);
            await router.push({ name: 'post.index' });
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors;
                }
            }
        }
    }

    const destroyPost = async (id) => {
        await axios.delete(`/api/post/${id}`);
    }

    return {
        errors,
        post,
        posts,
        getPost,
        getPosts,
        storePost,
        updatePost,
        destroyPost,
    }
}
