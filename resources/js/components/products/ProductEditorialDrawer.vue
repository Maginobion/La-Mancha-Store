<template>
   <div class="drawer-background" :class="{show: active}" @click="$emit('close-product-drawer')"/>
   <div class="drawer" :class="{show: active}">
       <div class="drawer-close" @click="$emit('close-product-drawer')">
           x
       </div>
       <div v-if="product" class="product-details">
           <h3 class="text-center">{{product.name}}</h3>
           <p class="editorial">{{product.editorial}}</p>
           <h3 class="text-center">${{product.price.toFixed(2)}}</h3>
           <div class="cart-total" v-if="product_total">
               <h3>In cart</h3>
               <h4>{{product_total}}</h4>
           </div>
           <div class="button-container">
               <button class="remove" @click="removeFromCart()">Remove</button>
               <button class="add" @click="addToCart()">Add</button>
           </div>
       </div>
   </div>   
</template>

<script>
import store from '../../../store/index'
export default{
    props:['product','active'],
    methods:{
        addToCart(){
            store.commit('addToCart', this.product)
        },
        removeFromCart(){
            store.commit('removeFromCart',this.product)
        }
    },
    computed:{
        product_total(){
            return store.getters.productQuantity(this.product)
        }
    }
}
</script>

<style>
.drawer-background{
    width: 100%;
    height: 100vh;
    position:fixed;
    left:0;
    top: 0;
    background-color: rgba(124, 124, 124, 0.55);
    z-index: 100;
    display: none;
    transition: display .5s;  
}

.drawer-background.show{
    display: block;
}

.drawer {
    width: 95vw;
    height: 100vh;
    background-color: white;
    position: fixed;
    top: 0;
    left: -105vw;
    padding: 15px;
    transition: left .5s;
    z-index: 101;
    overflow-y:scroll ;   
}

.drawer.show{
    left: 0;
}

.drawer-close{
    font-size: 1.5rem;
    padding: 5px;
    border-radius: 5px;
    right: 10px;
    border:2px solid gray;
    color: gray;
    width: 15px;
    float: right;
    cursor: pointer;
}

.drawer-close:hover{
    background-color: lightgray;
}

.product-details{
    display: flex;
    justify-content: center;
    flex-direction: column;   
}

p.editorial{
    padding: 20px;
    line-height: 1.5rem;
}

.buttton-container>button{
    width: 150px;
    border: none;
    padding: 10px;
    border-radius: 5px;
    margin: 0 5px 50px 5px;
    cursor: pointer;
}

@media(min-width:500px){
    .drawer {
        width: 450px;

    }
}

</style>