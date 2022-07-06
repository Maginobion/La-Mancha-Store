<template>
    <p>Término de búsqueda: {{$route.params.id || 'Todos'}}</p>
    <p v-if="cargando">Cargando papu</p>
    <p v-else v-for="libro in filtrados" :key="libro">{{libro.titulo}}</p>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useRouter } from 'vue-router'

    const route = useRouter();
    const libros = ref([]);
    let filtrados = ref([])
    const filter = () => filtrados = libros.value.filter(a=>a.title.includes(route.params.id))
    const cargando = ref(true);
    const url = 'https://la-mancha.herokuapp.com/api/libros'
    const fillLibros = () =>{
        fetch(url)
            .then(res => res.json())
            .then(data => libros.value = data)
            .finally(()=>cargando.value=false);
    }      
    
    onMounted(() => {
        fillLibros()
        filter()
    })
    
</script>

<style scoped>

</style>