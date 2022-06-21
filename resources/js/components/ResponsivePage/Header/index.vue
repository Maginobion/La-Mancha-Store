<template>
    <header class="header">
        <div class="header-top">
            <img src="../../../../../public/images/lamancha.jpg" width="600">
            <div class="search-bar">
                <form action="#">
                    <div class="search">
                        <input type="text" placeholder="Buscar en toda la tienda">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
            <div class="buttons">
                <div class="login">
                    <i class="fa-solid fa-user"></i>
                    <DropdownUser>
                        <template #trigger>
                            <slot name="loginname"></slot>
                        </template>
                        <template #content>
                            <slot name="dropcontent"></slot>
                        </template> 
                    </DropdownUser>
                </div>
                <button class="shopping-cart">
                    <i class="fa-solid fa-cart-plus"></i>
                </button>
            </div>
        </div>      
        <div class="header-bottom">
            <ul>
                <Header-links routing="/" text="Home"/>
                <Header-links routing="/prueba" text="Prueba"/>
                <Header-links routing="/atencion-cliente" text="Atencion"/>
                <Header-links routing="/pruebita" text="Pruebita"/>
                <Header-links routing="/carrusel" text="Carrusel"/>
                <Header-links routing="/form1" text="Formulario"/>
                <Header-links routing="/form2" text="Formulario2"/>
            </ul>
        </div>
    </header>
</template>

<script>
import HeaderLinks from '../HeaderLinks'
import DropdownUser from '../../DropdownUser'
export default {
    components:{
        HeaderLinks,
        DropdownUser
    }
}
</script>

<style scoped>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        

        @media (max-width: 600) {
            .header{
                display: flex;
                justify-items: center;
                margin-left: 20px;
            }
            
        }

        .header {
            width: 100%;
            padding: 1rem;
        }

        .header-top {
            padding: 1rem 1rem 0 1rem;
            display: flex;
            align-items: center;
        }

        .header-top .img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        img{
            object-fit: cover;
            height: 100%;
            margin-bottom: 50px;
        }

        .search-bar {
            flex-grow: 1;
            width: 100%;
            padding: 0 1.5rem;
            display: flex;
            flex-direction: column-reverse;
        }

        .search-bar form {
            width: 100%;
        }

        .search-bar form .search {
            display: flex;
            border: 1px solid #002f84;
            border-radius: .5rem;
        }

        .search-bar form .search input {
            flex-grow: 1;
            padding: .5rem 1rem;
            font-size: 1.125rem;
            border: none;
            border-radius: .5rem;
            outline: none;
        }

        .search-bar form .search button {
            border: none;
            outline: none;
            background: #ffbe07;
            padding: 0 1rem;
            border-radius: 0 .5rem .5rem 0;
            cursor: pointer;
        }

        .search-bar form .search button i {
            font-size: 1.125rem;
        }

        .buttons {
            padding: 0 1rem;
            display: flex;
            align-items: flex-end;
        }

        .buttons .login {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 1rem;
            align-items: center;
            border: none;
            outline: none;
            cursor: pointer;
            background: transparent;
        }

        .buttons .login i {
            font-size: 1.125rem;
            padding-bottom: .5rem;
            color: #002f84;
        }

        .buttons .shopping-cart {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 1rem;
            align-items: center;
            border: none;
            outline: none;
            cursor: pointer;
            background: transparent;
        }

        .buttons .shopping-cart i {
            font-size: 2.25rem;
            padding-bottom: .5rem;
            color: #002f84;
        }

        i{
            justify-content: center;
        }

        .header-bottom {
            margin: 1rem 0;
        }

        .header-bottom ul {
            display: flex;
            list-style: none;
            justify-content: center;
        }

        .header-bottom ul a {
            padding: .5rem 1.75rem;
            text-transform: uppercase;
            border-right: 1px solid #002f84;
            letter-spacing: 0.125rem;
            transition: .3s ease;
            text-decoration: none;
        }

        .header-bottom ul a:last-child {
            border-right: 0px solid #002f84;
        }

        .header-bottom ul a:hover {
            background: #002f84;
            color: #fff;
        }
    </style>