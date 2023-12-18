<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white">
            <p v-for="error in v" :key="error">
                {{ error }}
            </p>
        </div>
    </div>

    <form @submit.prevent="savePost" enctype="multipart/form-data">
        <input type="text" name="title" id="title"
            v-model="form.title">

        <textarea v-model="form.content" name="content" id="title"></textarea>

        <button type="submit">
            Créer
        </button>
    </form>
</template>

<script setup>
    import usePosts from "@/composables/post.js";
    import { reactive } from "vue";

    const form = reactive({
        title: '',
        content: '',
    });

    const { errors, storePost } = usePosts();

    const savePost = async () => {
        await storePost({ ...form });
    }
</script>
