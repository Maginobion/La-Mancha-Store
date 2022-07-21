<template>
    <p v-if="loading">Cargando...</p>
    <div v-else>
        <p class="titulo">Tus Libros</p>
        <p v-if="libros.length < 1">Aun no has comprado ningún libro.</p>
        <div v-else class="flex">
            <MyBooks :libros="libros"/>
        </div>      
    </div>
</template>

<style scoped>
.titulo{
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    color: rgb(30, 15, 238);
}
</style>

<script setup>
import MyBooks from './MyBooks'
import { onMounted, ref } from "@vue/runtime-core";
import axios from 'axios';

    let user;
    let final;
    try {
        user = document.head.querySelector('meta[name="user"]');
        final = JSON.parse(user.content).id;
    } catch (e) {
        final = "";
    }

    const libros = ref([]);
    const loading = ref(true);
    const id = final;
    

    const getLibreria = () => {
        axios.get('https://la-mancha.herokuapp.com/api/library/' + final)
            .then(res => {
                libros.value = res.data
                console.log(res.data)    
            })
            .finally(() => loading.value = false)
    }

    onMounted(()=>{
        getLibreria()
    })
</script>