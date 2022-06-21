<template>
    <router-view>
    <div id="nav">
        <router-link :class="{active: $route.name ==='Home'}" to="/casita">Home</router-link>
        <router-link :class="{active: $route.name ==='Cart'}" to="/carrito">Cart</router-link>

    </div>
    </router-view>
</template>



<script>
export default {
    methods:{
    
   updateCartFromLocalStorage(state){
            const cart = localStorage.getItem('cart')
            if(cart){
                state.cart = JSON.parse(cart)

            }
        },
        addtoCart (state, product){
            let item = state.cart.find(i => i.id === product.id)

            if(item){
                item.quantity++
            } else{
                state.cart.push({...product,quantity:1})
            }
            updateLocalStorage(state.cart)
        },
        removeFromCart(state, product){
            let item = state.cart.find(i => i.id === product.id)

            if (item){
                if(item.quantity > 1){
                    item.quantity--
                }else{
                    state.cart = state.cart.filter(i => i.id !== product.id)
                }
            }
            updateLocalStorage(state.cart)
        },

},

    
    mounted(){
        this.updateCartFromLocalStorage
        this.addtoCart
        this.removeFromCart

    }
}
</script>