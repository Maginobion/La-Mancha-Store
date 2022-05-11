require('./bootstrap');

import { createApp } from 'vue';
import * as VueRouter from 'vue-router'
import Mensaje from './components/Mensaje.vue'
import Prueba from './components/Prueba.vue'

const routes = [
    {path:'/', component: Mensaje},
    {path:'/prueba', component: Prueba}
]

const router = VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes  
})

const app = createApp({})

app.component('Mensaje', Mensaje)
app.component('Prueba', Prueba)

app.use(router)

app.mount('#app')