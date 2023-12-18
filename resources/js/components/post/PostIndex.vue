<template>
    <h2>Tous les articles</h2>
    <router-link :to="{ name: 'post.create' }">Ajouter</router-link>
    <table>
        <thead>
        <tr>
            <th>Titre</th>
            <th>Aperçu</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <template v-for="post in posts" :key="post.id">
                <td>{{ post.title }}</td>
                <td>{{ post.content }}</td>
                <td>
                    <router-link :to="{ name: 'post.edit', params: { id: post.id } }">Modifier</router-link>
                </td>
                <td>
                    <button @click="deletePost(post.id)">Supprimer</button>
                </td>
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
