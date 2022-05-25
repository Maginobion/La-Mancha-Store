<template>
    <div class="headerFlex">
        <router-link to="/">Home</router-link>
        <router-link to="/prueba">Prueba</router-link>
        <router-link to="/atencion-cliente">Atencion</router-link>
        <router-link to="/pruebita">Pruebita</router-link>
    </div>
</template>

<style scoped>
    .headerFlex{
        width: 1000px;
        display: flex;
        justify-content: space-between
    }    
    .headerFlex > a{
        padding: 5px;
        color: #475FA7;
        text-decoration: none
    }
</style>