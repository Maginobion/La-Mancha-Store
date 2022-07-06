<template>
    <p>Término de búsqueda: {{$route.params.word || 'Todos'}}</p>
    <p v-if="cargando">Cargando papu</p>
    <div v-else class="xd">
        <LibroDisplay :libros="filtrados"/>
    </div>   
</template>

<script setup>
import LibroDisplay from '../LibroDisplay'
import { computed, onMounted, ref } from "vue";
import { useRoute } from 'vue-router'
import axios from 'axios';

    const route = useRoute();
    const libros = ref([]);
    const cargando = ref(true);
    const url = 'http://127.0.0.1:8000/api/libros'
    const filtrados = computed(()=>{
        return libros.value.filter(a=>a.titulo.includes(route.params.word))
    })   
    const fillLibros = () =>{
        axios.get(url)
            .then(data => libros.value = data.data)
            .finally(()=>{
                cargando.value=false
                console.log(libros.value.toString)    
            });
    }      
    
    onMounted(() => {
        fillLibros()       
    })
    
</script>

<style scoped>
.xd{
    display: flex;
}
</style>