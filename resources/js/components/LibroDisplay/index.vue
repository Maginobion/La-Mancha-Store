<template>
    <router-link v-for="libro of libros" :to="{name:'descripcion', params:{id:libro.id}}" v-bind:key="libro" class="cardCont">
        <LibroCard :libro="libro"/>
    </router-link>
</template>

<script setup>
    import LibroCard from './LibroCard'
    const props = defineProps(['libros'])
</script>