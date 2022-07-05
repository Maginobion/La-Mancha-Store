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
        min-height: calc(100vh - 775px);
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