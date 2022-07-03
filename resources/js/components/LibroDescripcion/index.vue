<template>   
    <div v-if="loading">
        <p>Cargando...</p>
    </div>
    <div v-else>
        <p style="color:white; font-size: 35px; text-align:center">Detalles del Libro</p>
        <div class="totalCont">
            <div class="imageCont">
                <img :src="`/storage/${libro.caratula}`" width="200" height="90">
            </div>
            <div class="dibujo1">
                <form class="formulario">
                    <h2 style="font-size: 27px;">{{libro.titulo}}</h2>
                    <p type="Autor:">{{libro.autor}}</p>
                    <p type="Editorial:">{{libro.editorial}}</p>
                    <p type="Genero">{{libro.genero}}</p>
                    <p type="Contenido Apto">Mayores de 18 Años</p>
                    <p type="Precio">S/. {{libro.precio}}</p>
                    <p type="Sinopsis">{{libro.descripcion}}</p>
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
                .finally(()=>this.loading=false)
        },
    },
    mounted(){
        this.getLibro()
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

/* .imageCont{
    max-width: 600px;
    max-height: 1800px;
    overflow: hidden;
} */
img{ 
    height: auto;
    width: auto;
    max-width: 1800px;
    max-height: 1800px;
}
</style>