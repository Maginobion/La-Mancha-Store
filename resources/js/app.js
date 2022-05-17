require('./bootstrap');

import { createApp } from 'vue';
import * as VueRouter from 'vue-router'
import Mensaje from './components/Mensaje.vue'
import Prueba from './components/Prueba.vue'
import AtencionCliente from './components/Atencion-cliente/index.vue'
import nose from './components/pruebita.vue'

const routes = [
    {path:'/', component: Mensaje},
    {path:'/prueba', component: Prueba},
    {path:'/atencion-cliente', component: AtencionCliente},
    {path:'/pruebita', component: nose},
]

const router = VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes  
})

const app = createApp({})

app.component('Mensaje', Mensaje)
app.component('Prueba', Prueba)
app.component('Atencion-cliente',  AtencionCliente)
app.component('nose', nose)

app.use(router)

app.mount('#app')