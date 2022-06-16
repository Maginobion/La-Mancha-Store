<template>
    <div class="relative">
        <button @click="show=!show">
           <slot name="trigger"></slot>
        </button>
        <div v-show="show"
                class="absolute z-[-5px] mt-0 w-48 rounded-md shadow-lg origin-top-right right-0"
                style="display: none;"
                @click="disable">
            <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                <slot name="content"></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            show: false
        }
    },
    methods:{
        disable(){
            this.show=false
        },
        opposite(){
            this.show!=this.show
        },
        able(){
            this.show=true
        }
    },
    watch:{
        show(){
            console.log(this.show)
        }
    }
}
</script>