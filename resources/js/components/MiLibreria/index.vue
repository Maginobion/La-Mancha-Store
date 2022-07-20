<template>
    <p v-if="loading">Cargando.</p>
    <div v-else>
        <p v-if="libros.length < 1">Aun no has comprado ningún libro.</p>
        <div v-else class="flex">
            <MyBooks :libros="libros"/>
        </div>      
    </div>
</template>

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
        console.log(e)
        final = "";
    }

    const libros = ref([]);
    const loading = ref(true);

    const getLibreria = () => {
        axios.get('http://127.0.0.1:8000/api/library/' + final)
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