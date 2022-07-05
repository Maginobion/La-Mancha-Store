<template>
    <div class="cardCont">
        <div class="imgCont">
            <img :src="`/storage/${libro.caratula}`" alt="">
        </div>       
        <p class="title">Titulo: {{libro.titulo}}</p>
        <p>Autor: {{libro.autor}}</p>
    </div>    
</template>

<script setup>
    const props = defineProps(['libro'])
</script>

<style scoped>
.cardCont{
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid black;
    width: 220px;
    height: 380px;
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