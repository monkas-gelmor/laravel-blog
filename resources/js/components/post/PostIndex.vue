<template>
    <div class="flex items-center justify-between">
        <h2>Tous les articles</h2>
        <router-link :to="{ name: 'post.create' }" class="btn">Ajouter</router-link>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th>Titre</th>
            <th>Aperçu</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <template v-for="post in posts" :key="post.id">
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ post.title }}</th>
                    <td class="px-6 py-4">{{ post.content }}</td>
                    <td>
                        <router-link :to="{ name: 'post.edit', params: { id: post.id } }" class="btn">Modifier</router-link>
                    </td>
                    <td>
                        <button @click="deletePost(post.id)" class="btn btn--danger">Supprimer</button>
                    </td>
                </tr>
            </template>
        </tbody>
    </table>
    <div>

    </div>
</template>

<script setup>
    import usePosts from "@/composables/post";
    import { onMounted } from 'vue';

    const { posts, getPosts, destroyPost } = usePosts()

    const deletePost = async (id) => {
        if (!window.confirm('Voulez vous supprimer ?')) {
            return;
        }

        await destroyPost(id);
        await getPosts();
    }

    onMounted(getPosts)
</script>
