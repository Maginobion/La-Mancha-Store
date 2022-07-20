<template>
    <div class="cardCont">
        <div class="imgCont">
            <img :src="`https://ads-proyectofinal.s3.sa-east-1.amazonaws.com/caratulas/${libro.caratula}`" alt="">
        </div>       
        <p class="title">{{libro.titulo}}</p>
        <p>{{libro.autor}}</p>
        <p>S/{{libro.precio}}</p>
    </div>    
</template>

<script setup>
    import { computed } from '@vue/runtime-core'
    import axios from 'axios'
    const props = defineProps(['libro'])
    const url = 'http://127.0.0.1:8000/api/image/'
    const xd = computed(async()=>{
        return await axios.get(url+libro.caratula)
                    .then(res=>res.data)
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