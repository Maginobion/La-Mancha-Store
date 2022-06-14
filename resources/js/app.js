require('./bootstrap');

import { createApp } from 'vue';
import * as VueRouter from 'vue-router'
import Mensaje from './components/Mensaje.vue'
import Prueba from './components/Prueba.vue'
import AtencionCliente from './components/Atencion-cliente'
import nose from './components/pruebita.vue'
import ResponsivePage from './components/ResponsivePage'
import carrusel from './components/carrusel'

const routes = [
    {path:'/', component: Mensaje},
    {path:'/prueba', component: Prueba},
    {path:'/atencion-cliente', component: AtencionCliente},
    {path:'/pruebita', component: nose},
    {path:'/carrusel', component: carrusel},
]

const router = VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes  
})

const app = createApp({})

app.component('responsive-page', ResponsivePage)
app.use(router)

app.mount('#app')