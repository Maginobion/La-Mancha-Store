<template>
    <div class="cardCont">
        <template v-if="showState && loaded">
            <p>{{completedState ? 'Completado' : 'Sin completar'}}</p>
            <p>Página: {{actualPage}}</p>
        </template>       
        <div class="imgCont">
            <img :src="`https://ads-proyectofinal.s3.sa-east-1.amazonaws.com/caratulas/${libro.caratula}`" alt="">
        </div>       
        <p class="title">{{libro.titulo}}</p>
        <p>{{libro.autor}}</p>
        <p>S/{{libro.precio}}</p>
    </div>    
</template>

<script setup>

    var user;
    var final;
    try {
        user = document.head.querySelector('meta[name="user"]');
        final = JSON.parse(user.content).id;
    } catch (e) {
        final = "";
    }

    import { inject, onMounted, ref } from "@vue/runtime-core"
    import axios from "axios"

    const props = defineProps(['libro', 'showState'])
    const completedState = ref(false)
    const actualPage = ref(0)
    const loaded = ref(false)

    const http = inject('http', axios.create({
        baseURL: 'http://127.0.0.1:8000/api/',
    }))

    const getCompletedState = () =>{
        http.post('library/complete',{
            id_usuario: final,
            id_libro: props.libro.id
        })
            .then(res => completedState.value = res.data)
    }

    const getActualPage = () =>{
        http.post('library/page',{
            id_usuario: final,
            id_libro: props.libro.id
        })
            .then(res => actualPage.value = res.data)
            .finally(()=>loaded.value=true)
    }

    onMounted(()=>{
        getCompletedState()
        getActualPage()
    })
</script>

<style scoped>
.cardCont{
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid black;
    width: 220px;
    padding: 4px;
    border-radius: 8px;
    background-color: #f6f62a;
    transition: all 0.4px ease-in;
}
.imgCont{ 
    text-align: center;
    height: 330px;
}
img{
    height: 100%;
    object-fit: cover;
}
p::before{
    margin: 0;
}
.title{
    font-weight: bold;
}
.cardCont:hover{
    background-color: #f6f62add;
    transform: scale(1.005);
}
</style>