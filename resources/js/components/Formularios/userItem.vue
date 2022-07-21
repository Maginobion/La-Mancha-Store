<template>
    <td>{{user.name}}</td>
    <td>{{user.email}}</td>
    <td v-if="loading">Cargando...</td>
    <template v-else>
        <td class="option" v-if="user.id==1">Admin</td>
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
import { computed, onMounted, ref } from "@vue/runtime-core"
import axios from "axios"
import { useRoute, useRouter } from "vue-router"

    const router = useRouter()
    const isadmin = ref()
    const loading = ref(true)
    const props = defineProps(['user'])

    const makeAdmin = (id) =>{
        axios.post('http://127.0.0.1:8000/api/admin',{
            id: id
        })
        .then(res=>console.log(res))
        .finally(router.go('/'))
    }
    const removeAdmin = (id) =>{
        axios.delete('http://127.0.0.1:8000/api/admin/'+id)
        .then(res=>console.log(res))
        .finally(router.go('/'))
    }
    const isAdmin = () =>{
        axios.get('http://127.0.0.1:8000/api/admin/'+props.user.id)
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