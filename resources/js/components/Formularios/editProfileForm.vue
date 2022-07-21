<template>
    <p v-if="loading">Cargando...</p>
    <form v-else class="form">
        <h2>Tu Perfil</h2>
        <p type="Nombres:">
            <input 
                placeholder="Escriba su nombre..."
                required
                v-model="myUser.name"    
            >
        </p>
        <p type="Correo Electronico:">
            <input 
                placeholder="Escriba su correo..."
                v-model="myUser.email"     
            >
        </p>
        <div class="buttonCont">
            <button @click="save">Guardar Cambios</button>
        </div>
        <p style="color:red;" v-if="error">Ingrese un correo válido</p>
        <div class="botCont"> 
            <div>
                <span class="fa fa-phone"></span>034 666 333 222
            </div>
            <div>
                <span class="fa fa-envelope"></span>hola@LaMancha.com
            </div>            
        </div>
    </form>

</template>

<script setup>
import { inject, onMounted, ref } from "@vue/runtime-core";
import axios from "axios";
import { useRoute, useRouter } from "vue-router";
import UserList from "./userList.vue"

let user;
let final;
try {
    user = document.head.querySelector('meta[name="user"]');
    final = JSON.parse(user.content).id;
} catch (e) {
    final = "";
}
    
    const router = useRouter()
    const route = useRoute()
    const myUser = ref({})
    const loading = ref([true])
    const error = ref('')

    const http = inject('http', axios.create({
        baseURL: 'http://127.0.0.1:8000/api/',
    }))
    
    const getMyUser = () =>{
        http.get('user/'+final)
            .then(res => {
                myUser.value = res.data
                loading.value=false
            })
            .catch(err => console.log(err))
    }

    const save = () =>{
        http.patch('user/'+final,{
            name: myUser.value.name,
            email: myUser.value.email,
        }).catch(err => { 
                error.value = err
                throw err;
            })
            .then(()=>window.location.reload(),()=>{})
    }

    onMounted(()=>{
        getMyUser()
    })
</script>

<style scoped>
.form{
    background:white;
    margin:0;
    width: 500px;
    border-radius:8px;
    box-shadow: 0 0 40px -10px #000;
    margin: 40px auto;
    padding: 20px 30px;
    max-width: calc(100vw -40px);
    box-sizing: border-box;
    font-family: "Montserrat",sans-serif;
    position:relative; 
}
h2{
    margin:10px 0;
    padding-bottom: 10px;
    width: 180px;
    color: black;
    border-bottom: 3px solid black;
}
input{
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    background: none;
    border:0;
    font-family: "Montserrat",sans-serif;
    transition: all .3s;
    border-bottom: 2px solid grey;
}
input:focus{
    border-bottom: 2px solid lightblue;
}
p:before{
    content:attr(type);
    display:block;
    margin:28px 0 0;
    font-size: 14px;
    color:black;
}
button{
    padding: 8px 12px;
    margin:8px 0 0;
    border-radius: 10px;
    font-family: "Montserrat",sans-serif;
    border:2px solid gray;
    background: 0;
    color:black;
    cursor:pointer;
    transition: all .3s;
    align-content: center;
}
button:hover{
    background: gray;
    color: white;
}

.buttonCont{
    display: flex;
    justify-content: center;
    gap:10px;
    margin: 20px;
}

.botCont{
    display: flex;
    justify-content: space-between;
}

/* .form .btn1{
    margin-right: 10%;
    margin-top: 7%;
}
    .form .btn2{
    margin-right: 15%;
    margin-top: 7%;
}     */
</style>