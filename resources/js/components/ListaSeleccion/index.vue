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
                <td>S/. {{ parseFloat(lista.precio).toFixed(2) }}</td>
                <td style="color:red"><button @click="deleteItem(lista.id)">Borrar</button></td>
            </tr>
            <tr>
                <td colspan="2">Resumen</td>
                <td>S/. {{ listado.reduce((sum, valor) => (sum + parseFloat(valor.precio)), 0).toFixed(2) }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <button class="boton" :disabled="listado.length<1" @click="buyAll()">Confirmar Compra</button>
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
            listado: [],
            computado: 0,
            loading: true,
            usuario: final,
            total: 0,
        }
    },
    methods: {
        getListado() {
            this.$http.get('listado/' + this.usuario)
                .then(res => this.listado = res.data)
                .finally(() => this.loading = false)
        },
        deleteItem(id){
            this.$http.delete('listado/'+id)
            .then(res=>console.log(res))
            .then(()=>this.$router.go())
        },
        buyAll(){
            const data = new FormData();

            data.append('lista', JSON.stringify(this.listado));
            if(this.listado.length>0)
            this.$http.post('compra/'+this.usuario, data,{
                headers:{
                    'Content-Type':'multipart/form-data'
                }
                })
                .then(()=>this.$router.push('/libreria'))
        }
    },
    watch:{
        listado(){
            this.computado = Object.values(this.listado).reduce((sum, valor) => (sum + parseFloat(valor.precio.value)), 0).toFixed(2)
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
