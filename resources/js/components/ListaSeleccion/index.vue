<template>
    <div v-if="loading">
        <p>Cargando...</p>
    </div>
    <div v-else>
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
                <td>{{ lista.precio }}</td>
            </tr>
            <tr>
                <td colspan="3">Resumen</td>
                <td>{{ listado.reduce((sum, valor) => (sum + valor.precio), 0) }}</td>
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
        }
    },
    mounted() {
        this.getListado()
    }
}
</script>

<style scoped>

</style>
