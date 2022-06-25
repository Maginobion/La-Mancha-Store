<template>
    <div>
        <h1>Your Cart</h1>

        <CartItemCard
        v-for="product in products"
        :key="product.id"
        :product="product" />

        <CartSummaryPaymentCard 
        />

    </div>
</template>

<script>

import CartItemCard from '../components/cart/CartItemCard.vue'
import store from '../../store/index'

import CartSummaryPaymentCard from '../components/cart/CartSummaryPaymentCard.vue'

export default{
    components:{
        CartItemCard, CartSummaryPaymentCard
    },
    computed:{
        products(){
            return store.getters.cartItems
        }
    }
}

</script>

