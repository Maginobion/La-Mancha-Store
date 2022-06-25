<template>
    <div class="cart-item-card">
        <h3>Costo Total: ${{cart_total.toFixed(2)}}</h3>

        <button class="view-product-button">Pay by Credit Card</button>

    </div>
</template>

<script>
import store from '../../../store/index'

    export default{
    computed:{
        cart_total(){
            return store.getters.cartTotal
        }
    }
}

</script>
