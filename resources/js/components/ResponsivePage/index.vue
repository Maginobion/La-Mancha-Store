<template>
    <div class="cont">
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

import VueFooter from "./Footer"

export default {
    components:{
        VueFooter
    }
}
</script>