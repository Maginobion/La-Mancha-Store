<template>
    <div class="Home">
        <ProductEditorialDrawer
        :product="product"
        :active="active.product_drawer"
        v-on:close-product-drawer="closeProductDrawer()"
        />
        <div class="product-cards-container">
            <ProductSummaryCard
            v-for="product in items"
            :key="product.id"
            :product="product"
            v-on:view-product="viewProduct($event)"
            />
        </div>
        
    </div>
    <button @click="logItems">asd</button>
    <p>HOLA</p>
</template>

<script>

import items from '../../data/items'
import ProductSummaryCard from '../components/products/ProductSummaryCard.vue'
import ProductEditorialDrawer from '../components/products/ProductEditorialDrawer.vue'

export default {
    name:'Home',
    components:{
        ProductSummaryCard, ProductEditorialDrawer
    },
    data(){
        return{
            items: items,
            product: null,
            active:{
                product_drawer: false
            }            
        }
    },
    methods: {
        viewProduct(product){
            this.product = product
            this.active.product_drawer = true
            console.log(this.product)
        },
        closeProductDrawer(){
            this.active.product_drawer = false
        },
        logItems(){
            console.log(items)
        }
    }
}
</script>

<style>
.product-cards-container{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

</style>