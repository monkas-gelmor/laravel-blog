<template>
    <h2>Tous les articles</h2>
    <div v-for="post in posts">
        <div>
            <h2>{{ post.title }}</h2>
            <p>{{ post.content }}</p>
            <router-link :to="'/blog/' + post.id">Lire l'article</router-link>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        data() {
            return {
                posts: []
            }
        },
        created() {
            axios
                .get('http://localhost:8000/api/post/')
                .then(response => {
                    console.log(response);
                    this.posts = response.data;
                });
        }
    }
</script>
