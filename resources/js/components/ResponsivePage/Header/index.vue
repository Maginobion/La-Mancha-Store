<template>
    <header class="header">
        <div class="header-top">
            <div class="img">
                <img src="../../../../../public/images/lamancha.jpg" alt="">
            </div>
            <div class="search-bar">
                <form action="#">
                    <div class="search">
                        <input type="text" placeholder="Buscar en toda la tienda">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
            <div class="buttons">
                <button class="login">
                    <i class="fa-solid fa-user"></i>
                    <span>Iniciar sesión</span>
                </button>
                <button class="shopping-cart">
                    <i class="fa-solid fa-cart-plus"></i>
                </button>
            </div>
        </div>
        <div class="header-bottom">
            <ul>
                <router-link to="/">Home</router-link>
                <router-link to="/prueba">Prueba</router-link>
                <router-link to="/atencion-cliente">Atencion</router-link>
                <router-link to="/pruebita">Pruebita</router-link>
                <router-link to="/cabeza">cabeza</router-link>
                <router-link to="/carrusel">Carrusel</router-link>
            </ul>
        </div>
    </header>
</template>

<style scoped>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .header {
            width: 100%;
            padding: 1.25rem;
        }

        .header-top {
            padding: 1rem 1rem 0 1rem;
            display: flex;
        }

        .header-top .img {
            width: 100%;
            max-width: 20rem;
        }

        .header-top .img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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
            color: #002f84;
            letter-spacing: 0.125rem;
            transition: .3s ease;
            text-decoration: none;
        }

        .header-bottom ul li:last-child {
            border-right: 0px solid #002f84;
        }

        .header-bottom ul a:hover {
            background: #002f84;
            color: #fff;
        }
    </style>