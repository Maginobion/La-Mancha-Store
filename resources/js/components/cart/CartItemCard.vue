<template>
    <div class="cart-item-card">
        <div class="header">
            <h3>Nombre del libro: {{product.name}}</h3>
            <h4>Cantidad de libros: {{product.quantity}}</h4>
            <h4>Costo Total: {{item_cost.toFixed(2)}}</h4>
        </div>
        <p>Editorial: {{editorial}}</p>
    </div>
</template>

<script>


export default{
    props:['product'],
    computed:{
        editorial(){
            return this.product.editorial.substring(0, 120)
        },
        item_cost(){
            return this.product.price * this.product.quantity
        }
    }
}
</script>

<style>
.cart-item-card{
    width: 90%;
    margin: 5%;
    background-color: white;
    box-shadow: 0 0 5px gray;
    border-radius: 5px;
    padding: 10px;
    text-align: left;

    
}
.header{
        display: left;
        justify-content: space-around;
    }

</style>
