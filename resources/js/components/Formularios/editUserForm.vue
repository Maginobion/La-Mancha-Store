<template>
    <form action="" class="form">
        <div class="form-header">
            <h1 class="form-title">Edit Client</h1>
        </div>
        <label for="nombre" class="form-label">Nombres:</label>
        <input type="text" id="nombre" class="form-input" placeholder="Escriba su nombre">

        <label for="correo" class="form-label">Correo Electronico:</label>
        <input type="email" class="form-input" id="correo" placeholder="Escriba su correo">

        <label for="direccion" class="form-label">Telefono:</label>
        <input type="text" class="form-input" id="direccion" placeholder="Escriba su telefono">

            <label for="direccion" class="form-label">Departamento:</label>
        <input type="text" class="form-input" id="direccion" placeholder="Escriba su departamento">

        <label for="mensaje" class="form-label">Mensaje:</label>
        <textarea id="mensaje" class="form-textarea" placeholder="Escriba su mensaje"></textarea>

        <input type="submit" class="btn-submit" value="Confirmar"><br> <br> 
        <input type="submit" class="btn-submit" value="Cancelar">
    </form>
    <p class="loading" v-if="loading">Cargando...</p>
    <table v-else>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <UserList :users="users"></UserList>
        </tbody>
    </table>
</template>

<script setup>
import { inject, onMounted, ref } from "@vue/runtime-core";
import axios from "axios";
import UserList from "./userList.vue"

let user;
let final;
try {
    user = document.head.querySelector('meta[name="user"]');
    final = JSON.parse(user.content).id;
} catch (e) {
    final = "";
}

    const users = ref([])
    const loading = ref([true])

    const http = inject('http', axios.create({
        baseURL: 'http://127.0.0.1:8000/api/',
    }))
    
    const getUsers = () =>{
        http.get('user')
            .then(res => {
                users.value = res.data
                loading.value=false
            })
            .catch(err => console.log(err))
    }

    onMounted(()=>{
        getUsers()
    })
</script>

<style scoped>
.form .form-header .form-title{
    font-weight: normal;
    font-family: sans-serif;
    color:#fff;
    text-align: center;
    padding: 14px 0;
}
.form-header::first-letter{
    color:#ff851b;
}
 .form .form-header .form-title span{
    color:#fff;
}
 .form{
    background: rgba(0,0,0,.6);
    width: 90%;
    max-width: 650px;
    margin: auto;
    padding: 5px 35px;
    margin-top: 30px;
    padding-bottom:30px;
    border-radius: 3px;
}
 .form .form-label{
    display:block;
    color: #ff851b;
    font-size: 16px;
    font-family: Roboto;
    position: relative;
}
 .form .form-input, .form-textarea{
    background: rgb(0, 0, 0,.7);
    border: none;
    outline:none;
    border-bottom: 2px solid #ff851b;
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 2px;
    font-size: 14px;
    color: #FFF;
    font-family: Roboto;
}
    .form .form-textarea{
       resize:vertical;
       max-height: 100px;
       min-height:50px;
   }
    .form .btn-submit {
       width: 100%;
       font-family: Roboto;
       outline:none;
       background: #ff851b;
       font-size: 16px;
       border:none;
       color:#fff;
       padding: 15px 0;
       cursor: pointer;
       transition: all .5s ease;
   }
 .form .btn-submit:hover{
    background: #F29718;
}
body{
    background-size:cover ;
    background-attachment: fixed;
}
td{
    padding: 16px;
}
table{
    margin: 80px auto;
}
.loading{
    margin: 80px 0;
    text-align: center;
}

</style>