<template>
    <header class="header">
        <div class="header-top">
            <img src="../../../../../public/images/lamancha.jpg" width="600">
            <div class="search-bar">
                <form action="#">
                    <div class="search">
                        <input type="text" v-model="search" placeholder="Buscar en toda la tienda">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
            <div class="buttons">
                <div class="login">
                    <i class="fa-solid fa-user"></i>
                    <a class="text-white" href="/dashboard">Login</a>
                </div>
                <a href="/login" class="shopping-cart">
                    <i class="fa-solid fa-cart-plus"></i>
                </a>
            </div>
        </div>      
        <div class="header-bottom">
            <ul>
                <Header-links routing="/" text="Home"/>
                <Header-links routing="/atencion-cliente" text="Atencion"/>
            </ul>
        </div>
    </header>
</template>

<script>
import HeaderLinks from '../HeaderLinks'
export default {
    components:{
        HeaderLinks,
    },
    data(){
        return{
            search:''
        }
    }
}
</script>

<style scoped>
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
        background-color: black;
    }

    .header-top {
        padding: 1rem 1rem 0 1rem;
        display: flex;
        align-items: center;
    }

    .img{
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
        border-top-left-radius: .5rem;
        border-bottom-left-radius: .5rem;
    }

    form {
        width: 100%;
    }

    .search {
        display: flex;
        border: 1px solid #002f84;
        border-radius: .5rem;
        background-color: white;
    }

    input {
        flex-grow: 1;
        padding: .5rem 1rem;
        font-size: 1.125rem;
        border-top-left-radius: 0.5rem;
        border-bottom-left-radius: 0.5rem;
        border: none;
        outline: none;
    }

    button {
        border: none;
        outline: none;
        background: #ffbe07;
        padding: 0 1rem;
        border-radius: 0 .5rem .5rem 0;
        cursor: pointer;
    }

    button i {
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