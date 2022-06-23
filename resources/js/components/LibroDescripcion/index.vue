<template>   
    <div class="dibujo1">
        <p style="color:white; font-size: 35px;">Detalles del Libro</p>
        <p></p>
        <img src="../../../../public/images/libro1.jpg" width="220" height="300">
    </div>
    <div class="dibujo1">
        <form class="formulario">
            <h2 style="font-size: 27px;">{{libro.titulo}}</h2>
            <p type="Autor:">{{libro.autor}}</p>
            <p type="Genero">{{libro.genero}}</p>
            <p type="Contenido Apto">Mayores de 18 Años</p>
            <p type="Precio">S/. {{libro.precio}}</p>
            <p type="Resume">La Novela habla sobre la relación madre-hija. Delia ha perdido a su madre, que ha muerto misteriosamente ahogada cuando estaba de camino a visitarla. Cuando regresa a Nápoles, ciudad en la que creció y de la que siempre ha querido huir, se reencuentra con unos personajes y un pasado perturbadores.
            </p>
        </form>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{
            url:'http://127.0.0.1:8000/api/libros/',
            libro:{}
        }  
    },
    methods:{
        getLibro(){
            axios.get(this.url+this.$route.params.id)
                .then(res => this.libro = res.data)
        }
    },
    mounted(){
        this.getLibro()
    }
}
</script>

<style scoped>
.formulario{
    position:relative;
    background:white;
    width: 450px;
    border-radius:8px;
    padding: 20px 30px;
    font-family: "Montserrat",sans-serif;
    left: 250px;
    top: -350px;
}
.dibujo1{
    position:relative;
    left: 200px;
}
</style>