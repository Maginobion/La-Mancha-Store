<template>
    <tr v-for="user in users" :key="user">
        <UserItem :user="user"></UserItem>
    </tr>
</template>

<script setup>
    import UserItem from "./userItem.vue"
    const props = defineProps(['users'])
</script>