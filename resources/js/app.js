import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';
import * as VueRouter from 'vue-router'
import Home from './components/Home'
import AtencionCliente from './components/Atencion-cliente'
import ResponsivePage from './components/ResponsivePage'
import HeaderPage from './components/ResponsivePage/Header'
import DropdownUser from './components/DropdownUser'
import WelcomeHeader from './components/ResponsivePage/WelcomeHeader'
import AddUserForm from './components/Formularios/addUserForm.vue'
import EditUserForm from './components/Formularios/editUserForm.vue'
import AddLibroForm from './components/Formularios/addLibroForm.vue'
import LibroDescripcion from './components/LibroDescripcion'
import BusquedaLibros from './components/BusquedaLibros'
import ListaSeleccion from "./components/ListaSeleccion";
import MiLibreria from "./components/MiLibreria"
import LectorLibro from "./components/LectorLibro"

const routes = [
    {path:'/atencion-cliente', component: AtencionCliente},
    {path:'/adduser', component: AddUserForm},
    {path:'/edituser', component: EditUserForm},
    {path:'/addlibro', component: AddLibroForm},
    {path:'/libro/:id', name:'descripcion' ,component: LibroDescripcion},
    {path:'/search/:word?', name:'busqueda', component: BusquedaLibros},
    {path: '/listaSeleccion', name:'listaSeleccion', component: ListaSeleccion},
    {path: '/libreria', name:'libreria', component: MiLibreria},
    {path: '/read/:id', name:'lector', component: LectorLibro},
    {path:'/', component: Home},
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
app.use(router)

app.mount('#app')
