<template>
    <router-link :to="routing">{{text}}</router-link>
</template>

<style scoped>
a.router-link-exact-active{
    color: #002f84;
}
</style>

<script>
export default {
    props:{
        routing: String,
        text: String,
    }
}
</script>
