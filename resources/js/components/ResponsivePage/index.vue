<template>
    <div class="cont">
        <slot/>        
    </div>
    <VueFooter/>
</template>

<style scoped>
    .cont{
        position: relative;
        padding: 20px;
    }
</style>

<script>

import VueFooter from "./Footer"

export default {
    components:{
        VueFooter,
    }
}
</script>