require('./bootstrap');

import { createApp } from 'vue';
import * as VueRouter from 'vue-router'
import Mensaje from './components/Mensaje.vue'
import Prueba from './components/Prueba.vue'
import AtencionCliente from './components/Atencion-cliente/index.vue'
import nose from './components/pruebita.vue'
import ResponsivePage from './components/ResponsivePage/index.vue'
import carrusel from './components/carrusel/carrusel.vue'

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

app.component('Mensaje', Mensaje)
app.component('Prueba', Prueba)
app.component('Atencion-cliente',  AtencionCliente)
app.component('responsive-page', ResponsivePage)
app.component('nose', nose)
app.component('carrusel', carrusel)
app.use(router)

app.mount('#app')