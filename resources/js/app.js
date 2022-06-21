import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';
import Vuex from 'vuex';
import * as VueRouter from 'vue-router'
import Mensaje from './components/Mensaje.vue'
import Prueba from './components/Prueba.vue'
import AtencionCliente from './components/Atencion-cliente'
import nose from './components/pruebita.vue'
import ResponsivePage from './components/ResponsivePage'
import carrusel from './components/carrusel'
import HeaderPage from './components/ResponsivePage/Header'
import DropdownUser from './components/DropdownUser'
import WelcomeHeader from './components/ResponsivePage/WelcomeHeader'
import Form from './components/Formularios/formulario1.vue'
import Form2 from './components/Formularios/formulario2.vue'
import casita from './components/Home.vue'
import carrito from './components/Cart.vue'
import inicio from './components/App.vue'

const routes = [
    {path:'/', component: Mensaje},
    {path:'/prueba', component: Prueba},
    {path:'/atencion-cliente', component: AtencionCliente},
    {path:'/pruebita', component: nose},
    {path:'/carrusel', component: carrusel},
    {path:'/form1', component: Form},
    {path:'/form2', component: Form2},
    {path:'/casita', component: casita},
    {path:'/carrito', component: carrito},
]

const router = VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes  
})

const app = createApp({})

app.component('responsive-page', ResponsivePage)
app.component('header-page', HeaderPage)
app.component('dropdown-user',DropdownUser)
app.component('welcome-header', WelcomeHeader)
app.component('casa', casita)
app.component('carrito', carrito)
app.component('inicio', inicio)
app.use(Vuex)
app.use(router)



app.mount('#app')