<template>
    <div class="card">
        <h3>Libro:{{product.name}}</h3>

        <h5 class="price">Precio: ${{product.price.toFixed(2)}}</h5>
        <p class="editorial">Editorial:{{editorial}}</p>
        <p class="text-muted">Genero: {{product.genero}}</p>
        <button class="view-product-button" @click="$emit('view-product',product)">Ver el Producto</button>


    </div>
</template>

<script>
     export default{
         props:['product'],
         computed: {
             editorial(){
                 return this.product.editorial.substring(0, 150)
             }
         }
     }
</script>

<style>
    .card{
        width: 80%;
        margin: 10%;
        padding: 10px;
        border-radius: 5px;
        background-color: white;
        box-shadow: 0 0 5px gray;
    }
     .card>h5.price{
            color: gray;
        }
        .card>p.editorial{
            font-size: .85rem;
        }

        .card>p.text-muted{
            color: gray;
        }
     button.view-product-button{
            padding: 10px;
            background-color: rgb(79, 160, 187);
            border: none;
            color:white;
            font-weight: bold;
            font-size: 1.15rem;
            border-radius: 5px;
            cursor: pointer;

        }

    @media (min-width: 500px){
        .card{
            width: 350px;
            margin:10px;
        }
    }

</style>
