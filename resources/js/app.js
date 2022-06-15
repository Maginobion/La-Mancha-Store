import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';
import * as VueRouter from 'vue-router'
import Mensaje from './components/Mensaje.vue'
import Prueba from './components/Prueba.vue'
import AtencionCliente from './components/Atencion-cliente'
import nose from './components/pruebita.vue'
import ResponsivePage from './components/ResponsivePage'
import carrusel from './components/carrusel'
import HeaderPage from './components/ResponsivePage/Header'
import DropdownUser from './components/DropdownUser'

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
app.component('header-page', HeaderPage)
app.component('dropdown-user',DropdownUser)
app.use(router)

app.mount('#app')