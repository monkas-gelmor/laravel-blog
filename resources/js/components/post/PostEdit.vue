<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white">
            <p v-for="error in v" :key="error">
                {{ error }}
            </p>
        </div>
    </div>

    <form v-on:submit.prevent="savePost" enctype="multipart/form-data">
        <div class="form-row">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title"
                   v-model="post.title">
        </div>

        <div class="form-row">
            <label for="content">Contenu</label>
            <textarea v-model="post.content" name="content" id="content" cols="15"></textarea>
        </div>

        <div class="form-row">
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
        </div>

        <div class="form-row">
            <button type="submit" class="btn">
                Enregistrer
            </button>
        </div>
    </form>
</template>

<script setup>
    import usePosts from "@/composables/post.js";
    import { onMounted } from "vue";

    const { errors, post, updatePost, getPost } = usePosts();
    const props = defineProps({
        id: {
            required: true,
            type: String,
        },
    });

    onMounted(() => getPost(props.id));

    const savePost = async () => {
        await updatePost(props.id);
    }
</script>
