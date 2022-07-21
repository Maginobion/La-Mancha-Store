<template>
    <td>{{user.name}}</td>
    <td>{{user.email}}</td>
    <td v-if="loading">Cargando...</td>
    <template v-else>
        <td class="option" v-if="user.id==1 || user.id == id">Admin</td>
        <td class="option" v-else-if="isadmin===0">
            <button class="add" @click="makeAdmin(user.id)">
                Hacer admin
            </button>
        </td>
        <td class="option" v-else>
            <button class="remove" @click="removeAdmin(user.id)">
                Remover admin
            </button>
        </td>
    </template>
</template>

<script setup>

let pageuser;
let final;
try {
    pageuser = document.head.querySelector('meta[name="user"]');
    final = JSON.parse(pageuser.content).id;
} catch (e) {
    final = "";
}

import { inject, onMounted, ref } from "@vue/runtime-core"
import axios from "axios"
import { useRouter } from "vue-router"

    const router = useRouter()
    const isadmin = ref()
    const loading = ref(true)
    const id = ref(final)
    const props = defineProps(['user'])

    const http = inject('http', axios.create({
        baseURL: 'http://127.0.0.1:8000/api/',
    }))

    const makeAdmin = (id) =>{
        http.post('admin',{
            id: id
        })
        .then(res=>console.log(res))
        .finally(router.go('/'))
    }
    const removeAdmin = (id) =>{
        http.delete('admin/'+id)
        .then(res=>console.log(res))
        .finally(router.go('/'))
    }
    const isAdmin = () =>{
        http.get('admin/'+props.user.id)
                .then(res=> {
                    isadmin.value = res.data
                    loading.value = false    
                })
    }
    onMounted(()=>{
        isAdmin()
    })
</script>

<style scoped>
td{
    padding: 16px;
}
.add{
    padding: 5px;
    background-color: aquamarine;
    border-radius: 8px;
}

.remove{
    padding: 5px;
    background-color: rgb(221, 68, 68);
    border-radius: 8px;
}

.option{
    text-align: center;
}
</style>