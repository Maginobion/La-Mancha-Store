<template>
    <router-link :to="routing">{{text}}</router-link>
</template>

<style scoped>
a{
    color: white;
}
a.router-link-exact-active{
    color: #335eae;
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
