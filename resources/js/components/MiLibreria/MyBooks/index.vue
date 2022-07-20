<template>
    <router-link v-for="libro of libros" :to="{name:'lector', params:{id:libro.id}}" v-bind:key="libro" class="cardCont">
        <LibroCard :libro="libro"/>
    </router-link>
</template>

<script setup>
    import LibroCard from '../../LibroDisplay/LibroCard'
    const props = defineProps(['libros'])
</script>
