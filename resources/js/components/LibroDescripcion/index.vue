<template>
    <div v-if="loading">
        <p>Cargando...</p>
    </div>
    <div v-else>
        <p style="color:white; font-size: 35px; text-align:center">Detalles del Libro</p>
        <div class="totalCont">
            <div class="imageCont">
                <img :src="`https://ads-proyectofinal.s3.sa-east-1.amazonaws.com/caratulas/${libro.caratula}`" width="200" height="90">
            </div>
            <div class="infoCard">
                <h2 style="font-size: 27px;">{{ libro.titulo }}</h2>
                <h3>Autor:</h3>
                <p>{{ libro.autor }}</p>
                <h3>Editorial:</h3>
                <p>{{ libro.editorial }}</p>
                <h3>Genero</h3>
                <p>{{ libro.genero }}</p>
                <h3>Contenido Apto:</h3>
                <p>Mayores de 18 Años</p>
                <h3>Precio:</h3>
                <p>S/. {{ libro.precio }}</p>
                <h3>Sinopsis:</h3>
                <p>{{ libro.descripcion }}</p>
                <button v-on:click="guardarSeleccion(libro.id, libro.titulo, libro.precio)"
                        style="background: #1a202c; border-radius: 5px; padding: 10px; color: white">
                    Agregar libro
                </button>
                <a :href="`https://ads-proyectofinal.s3.sa-east-1.amazonaws.com/pdf/${libro.readable}`">Leer</a>
            </div>
        </div>
    </div>
</template>

<script>

//Inicializando variable para controlar el usuario
var user;
var final;
try {
    user = document.head.querySelector('meta[name="user"]');
    final = JSON.parse(user.content).id;
} catch (e) {
    final = "";
}

export default {
    data() {
        return {
            libro: {},
            loading: true,
            usuario: final,
        }
    },
    methods: {
        getLibro() {
            this.$http.get('libros/' + this.$route.params.id)
                .then(res => this.libro = res.data)
                .catch(err=>console.log(err))
                .finally(() => this.loading = false)
        },
        guardarSeleccion(id, titulo, precio) {
            if(this.usuario=='') window.location.replace('/login')
            else
            this.$http.post('selection', {
                "id_usuario": this.usuario,
                "id_libro": id,
                "libro": titulo,
                "precio": precio
            })
                .then(res=> console.log(res))
                .catch(err=>console.log(err))
                
        }
    },
    mounted() {
        this.getLibro()
    }
}
</script>

<style scoped>
.totalCont {
    display: flex;
    justify-content: center;
    gap: 120px;
}

.infoCard {
    position: relative;
    background: white;
    width: 450px;
    border-radius: 8px;
    padding: 20px 30px;
    font-family: "Montserrat", sans-serif;
    border: 1px solid gray;
    border-radius: 8px;
}

.infoCard p {
    margin-bottom: 12px;
}

.imageCont {
    text-align: center;
    height: 330px;
    max-width: 600px;
    max-height: 1800px;
    overflow: hidden;
}

img {
    height: 100%;
    object-fit: cover;
    max-width: 1800px;
    max-height: 1800px;
}

h3 {
    font-size: 12px;
}
</style>
