<template>
    <div v-if="loading">
        <p>Cargando...</p>
    </div>
    <div v-else style="display: flex;justify-content: center;gap: 120px;">
        <table>
            <thead>
            <tr>
                <td>Item</td>
                <td>Libro</td>
                <td>Cantidad</td>
                <td>Precio</td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(lista,index) of listado" v-bind:key="index">
                <td>{{ index + 1 }}</td>
                <td>{{ lista.libro }}</td>
                <td>{{ lista.cantidad }}</td>
                <td>$/. {{ lista.precio.toFixed(2) }}</td>
            </tr>
            <tr>
                <td colspan="3">Resumen</td>
                <td>$/. {{ listado.reduce((sum, valor) => (sum + valor.precio), 0).toFixed(2) }}</td>
            </tr>
            </tbody>
        </table>
    </div>
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
            url: 'https://la-mancha.herokuapp.com/api/listado/',
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
</style>
