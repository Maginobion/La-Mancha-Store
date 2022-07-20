<template>
    <p v-if="loading">Cargando...</p>
    <div v-else>
        <p>Habla</p>
        <a :href="`https://ads-proyectofinal.s3.sa-east-1.amazonaws.com/pdf/${libro.readable}`">Leer</a>
        <div class="pdf">
            <vue-pdf-embed
                :source="`https://ads-proyectofinal.s3.sa-east-1.amazonaws.com/pdf/${libro.readable}`" 
                :page="2"/>
        </div>    
    </div>  
</template>

<style scoped>
    .pdf{
        margin: auto;
        width: 80%;
    }
</style>

<script setup>
    import { ref } from "@vue/reactivity";
    import { onMounted } from "@vue/runtime-core";
    import axios from 'axios';
    import VuePdfEmbed from 'vue-pdf-embed'
import { useRoute } from "vue-router";

    const route = useRoute()
    const libro = ref({})
    const loading = ref(true)
    const url = 'http://127.0.0.1:8000/api/libros/'

    const getLibro = () => {
        axios.get(url + route.params.id)
            .then(res => libro.value = res.data)
            .catch(err=>console.log(err))
            .finally(() => loading.value = false)
    }

    onMounted(() => 
        getLibro()
    )
</script>