<template>
    <div v-if="loading">
        <p>Cargando...</p>
    </div>
    <div v-else>
        <table class="tabla">
            <thead>
            <tr>
                <td>Item</td>
                <td>Libro</td>
                <td>Cantidad</td>
                <td>Precio</td>
                <td>Acciones</td>
            </tr>
            </thead>
            <tbody>
            <tr v-if="listado.length < 1">
                <td colspan="5">Aun no hay libros. Agrega uno!</td>
            </tr>
            <tr v-else v-for="(lista,index) of listado" v-bind:key="index">
                <td>{{ index + 1 }}</td>
                <td>{{ lista.libro }}</td>
                <td>{{ lista.cantidad }}</td>
                <td>S/. {{ lista.precio.toFixed(2) }}</td>
                <td style="color:red"><button @click="deleteItem(lista.id)">Borrar</button></td>
            </tr>
            <tr>
                <td colspan="3">Resumen</td>
                <td>S/. {{ listado.reduce((sum, valor) => (sum + valor.precio), 0).toFixed(2) }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <button class="boton" :disabled="listado.length<1" @click="buyAll()">Confirmar Compra</button>
</template>

<script>

//Inicializando variable para controlar el usuario
import axios from "axios";

var user;
var final;
try {
    user = document.head.querySelector('meta[name="user"]');
    final = JSON.parse(user.content).id;
} catch (e) {
    console.log(e)
    final = "";
}

export default {
    data() {
        return {
            url: 'http://127.0.0.1:8000/api/listado/',
            listado: [],
            loading: true,
            usuario: final,
            total: 0,
        }
    },
    methods: {
        getListado() {
            axios.get(this.url + this.usuario, {
                params: {
                    'usuario': this.usuario,
                }
            })
                .then(res => this.listado = res.data)
                .finally(() => this.loading = false)
        },
        deleteItem(id){
            axios.delete(this.url+id)
            .then(res=>console.log(res))
            .then(()=>this.$router.go())
        },
        buyAll(){
            const data = new FormData();

            data.append('lista', JSON.stringify(this.listado));
            console.log(this.listado)
            if(this.listado.length>0)
            axios.post('http://127.0.0.1:8000/api/compra/'+this.usuario, data,{
                headers:{
                    'Content-Type':'multipart/form-data'
                }
                })
                .then(()=>this.$router.go())

            //agregar cada append
            // const formData = new FormData();
            // formData.append('titulo',this.form.titulo);
            // formData.append('autor',this.form.autor);
            // formData.append('editorial',this.form.editorial);
            // formData.append('descripcion',this.form.descripcion);
            // formData.append('precio',this.form.precio);
            // formData.append('caratula',this.caratula, this.caratula.name);
            // formData.append('readable',this.readable, this.readable.name);
            // formData.append('genero',this.form.genero);               
            // axios.post('http://127.0.0.1:8000/api/libros',formData,{
            //     headers:{
            //         'Content-Type':'multipart/form-data'
            //     }
            // }).then(res => console.log(res))
            //     .catch(err=>console.log(err))
            //     .finally(()=>this.$router.push('/'))
        }
    },
    mounted() {
        this.getListado()
    }
}
</script>

<style scoped>
*{
    font-size: 18px;
}

.tabla{
    margin: 40px auto 0 auto;
}

thead {
    background: #4a5568;
    color: white;
    font-weight: 600;
}

td {
    border: 1px solid black;
    padding: 10px;
    text-align: center;
}
.boton{
    color:#002F84;
    background-color: #FFBE07;
    border-radius: 20px;
    margin: 24px auto;
    display: flex;
    justify-content: center;
    padding: 4px 20px;
}
.boton:disabled{
    filter: gray;
    -webkit-filter: grayscale(1);
    filter: grayscale(1);
}
</style>
