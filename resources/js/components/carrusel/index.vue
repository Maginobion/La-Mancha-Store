<template>
        <div class="totalCont">
                <h1>Catalogo</h1>
                <div class="lineCont">
                        <div class="cardCont">
                                <img src="../../../../public/images/libro1.jpg" width="220" height="300">
                                <div class="center">- El Amor Molesto -</div>
                                <div class="center">S/. 69.00</div>
                        </div>
                        <div class="cardCont">
                                <img src="../../../../public/images/libro2.jpg" width="220" height="300">
                                <div class="center">- La trenza -</div>
                                <div class="center">S/. 69.00</div>
                        </div>
                        <div class="cardCont">
                                <img src="../../../../public/images/libro3.jpg" width="220" height="300">
                                <div class="center">- Paula - </div>
                                <div class="center">S/. 69.00</div>
                        </div>
                        <div class="cardCont">
                                <img src="../../../../public/images/libro4.jpg" width="220" height="300">
                                <div class="center">- Nueve Lunas - </div>
                                <div class="center">S/. 69.00</div>
                        </div>
                        <div class="cardCont">
                                <img src="../../../../public/images/libro5.jpg" width="220" height="300">
                                <div class="center">- Guia Para Madres Rebeldes -</div>
                                <div class="center">S/. 69.00</div>
                        </div>
                        <div class="cardCont">
                                <img src="../../../../public/images/libro6.jpg" width="220" height="300">
                                <div class="center">- Parece que Fuera Primavera</div>
                                <div class="center">S/. 69.00</div>
                        </div>
                </div>
                <h1>Destacado</h1>
                <div class="lineCont">
                        <div class="cardCont">
                                <img src="../../../../public/images/libro7.jpg" width="220" height="300">
                                <div class="center">- El Año del Viento - </div>
                                <div class="center">S/. 69.00</div>
                        </div>
                        <div class="cardCont">
                                <img src="../../../../public/images/libro8.jpg" width="220" height="300">
                                <div class="center">- Orgullo y Prejuicio - </div>
                                <div class="center">S/. 69.00</div>
                        </div>
                        <div class="cardCont">
                                <img src="../../../../public/images/libro9.jpg" width="220" height="300">
                                <div class="center">- Las Tres Hermanas -</div>
                                <div class="center">S/. 69.00</div>
                        </div>
                        <div class="cardCont">
                                <img src="../../../../public/images/libro10.jpg" width="220" height="300">
                                <div class="center">- Una Habitacion Propia- </div>
                                <div class="center">S/. 69.00</div>
                        </div>
                        <div class="cardCont">
                                <img src="../../../../public/images/libro11.jpg" width="220" height="300">
                                <div class="center">- Julia Quinn - </div>
                                <div class="center">S/. 69.00</div>
                        </div>
                        <div class="cardCont">
                                <img src="../../../../public/images/libro12.jpg" width="220" height="300">
                                <div class="center">- El Infinito -</div>
                                <div class="center">S/. 69.00</div>
                        </div>
                </div>
        </div>
        <p v-for="libro of libros" v-bind:key="libro">
                {{libro.titulo}}
        </p>
</template>

<style scoped>
.totalCont{
        display: flex;
        flex-direction: column;
        align-items: center;
}
.lineCont{
        display: flex;
}
.cardCont{
        display: flex;
        flex-direction: column;
        align-items: center;
}
.center{
        text-align: center;
}
</style>

<script>
export default {
    //Estare probando aca si funcionan las APIs
    data(){
        return{
                url:'https://la-mancha.herokuapp.com/api/libros',
                libros:[],
        }
    },
    methods: {
        fillLibros(){
                fetch(this.url)
                .then(res => res.json())
                .then(data=>this.libros = data);
        }
    },
    mounted(){
        this.fillLibros()
    }
}
</script>