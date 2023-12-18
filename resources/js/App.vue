<template>
    <div>
        <div>
            Blog
        </div>

        <nav>
            <div>
                <div>
                    <router-link to="/" class="nav-item nav-link">Accueil</router-link>
                    <router-link to="/blog" class="nav-item nav-link">Blog</router-link>
                </div>
            </div>
        </nav>
        <br/>
        <router-view></router-view>
    </div>
</template>

<script>
export default {}
</script>
