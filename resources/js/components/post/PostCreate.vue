<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white">
            <p v-for="error in v" :key="error">
                {{ error }}
            </p>
        </div>
    </div>

    <form @submit.prevent="savePost" enctype="multipart/form-data">
        <div class="form-row">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title"
                   v-model="form.title">
        </div>

        <div class="form-row">
            <label for="content">Contenu</label>
            <textarea v-model="form.content" name="content" id="content"></textarea>
        </div>

        <div class="form-row">
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
        </div>

        <div class="form-row">
            <button type="submit" class="btn">
                Créer
            </button>
        </div>
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
