<template>   
    <div v-if="loading">
        <p>Cargando...</p>
    </div>
    <div v-else>
        <p style="color:white; font-size: 35px;">Detalles del Libro</p>
        <div class="totalCont">
            <div class="dibujo1">           
                <img :src="`/storage/${getOriginalPath(libro.caratula)}`" width="200" height="90">
            </div>
            <div class="dibujo1">
                <form class="formulario">
                    <h2 style="font-size: 27px;">{{libro.titulo}}</h2>
                    <p type="Autor:">{{libro.autor}}</p>
                    <p type="Genero">{{libro.genero}}</p>
                    <p type="Contenido Apto">Mayores de 18 Años</p>
                    <p type="Precio">S/. {{libro.precio}}</p>
                    <p type="Sinopsis">La Novela habla sobre la relación madre-hija. Delia ha perdido a su madre, que ha muerto misteriosamente ahogada cuando estaba de camino a visitarla. Cuando regresa a Nápoles, ciudad en la que creció y de la que siempre ha querido huir, se reencuentra con unos personajes y un pasado perturbadores.
                    </p>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{
            url:'http://127.0.0.1:8000/api/libros/',
            libro:{},
            loading: true
        }  
    },
    methods:{
        getLibro(){
            axios.get(this.url+this.$route.params.id)
                .then(res => this.libro = res.data)
        },
        getOriginalPath(caratula){
            let index = caratula.indexOf('/')
            return caratula.substring(index+1)           
        }
    },
    mounted(){
        console.log(this.$route.params.id)
        this.getLibro()
        this.loading=false
    }
}
</script>

<style scoped>
.totalCont{
    display: flex;
    justify-content: center;
    gap: 200px;
}
.formulario{
    position:relative;
    background:white;
    width: 450px;
    border-radius:8px;
    padding: 20px 30px;
    font-family: "Montserrat",sans-serif;
}
.dibujo1{
    left: 200px;
}
</style>