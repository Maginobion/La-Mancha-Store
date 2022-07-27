<template>
    <router-link v-for="libro of libros" :to="{name:'lector', params:{id:libro.id}}" v-bind:key="libro" class="cardCont">
        <LibroCard :libro="libro" :showState="true"/>
    </router-link>
</template>

<script setup>
    import LibroCard from '../../LibroDisplay/LibroCard'
    const props = defineProps(['libros'])
</script>
