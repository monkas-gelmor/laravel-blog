<template>
    <h1>{{ post.title }}</h1>
    <p>{{ post.content }}</p>
</template>

<script>
    import axios from "axios";

    export default {
        data() {
            return {
                post: []
            }
        },
        created() {
            axios
                .get('http://localhost:8000/api/post/' + this.$route.params.post)
                .then(response => {
                    console.log(response);
                    this.post = response.data;
                });
        }
    }
</script>
