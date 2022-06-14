<template>
    <div class="cont">
        <VueHeader/>
        <slot/>
        <VueFooter/>
    </div>   
</template>

<style scoped>
    .cont{
        position: relative;
        height: 100%;
    }
</style>

<script>

import VueHeader from "./Header"
import VueFooter from "./Footer"

export default {
    components:{
        VueHeader,
        VueFooter
    }
}
</script>