<template>
    <p v-if="loading">Cargando...</p>
    <div v-else>
        <a
            @click="clickedDownload(libro)">Descargar</a>       
        <div class="cont">
            <button v-if="pdfLoaded" :disabled="actualPage<=1" @click="actualPage--">Anterior</button>
            <div class="pdf">
                <vue-pdf-embed
                ref="pdf"
                :source="`https://ads-proyectofinal.s3.sa-east-1.amazonaws.com/pdf/DÍA 5 - SEMANA 16 - CIENCIA.pdf`" 
                :page="actualPage"
                @loaded="handleDocumentParams"/>
            </div>
            <template v-if="pdfLoaded">
                <button v-if="actualPage<pageCount" @click="actualPage++">Siguiente</button>
                <button v-else @click="finishBook(libro)">Finalizar lectura</button>
            </template>           
        </div>     
    </div>  
</template>

<style scoped>
    .cont{
        display: flex;
        align-items: center;
    }
    .pdf{
        margin: auto;
        width: 100%;      
    }
    button{
        border-radius: 8px;
        font-size: 24px;
        height: 140px;
        width: 180px;
        display: flex;
        justify-content: center;
        align-items: center;
        vertical-align: middle;
        color: white;
        background-color: aqua;
        height: fit-content;
    }
    button:disabled{
        background-color: gray;
    }
    a{
        display: flex;
        justify-content: center;
        border-radius: 999px;
        padding: 4px;
        color: #002f84;
        background-color: #ffbe07;
        cursor: pointer;
    }
</style>



<script setup>
    // `https://ads-proyectofinal.s3.sa-east-1.amazonaws.com/pdf/${libro.readable}`
    // `https:ads-proyectofinal.s3.sa-east-1.amazonaws.com/pdf/DÍA 5 - SEMANA 16 - CIENCIA.pdf`
    import { ref } from "@vue/reactivity";
    import { inject, onMounted, watch } from "@vue/runtime-core";
    import axios from 'axios';
    import VuePdfEmbed from 'vue-pdf-embed'
    import { useRoute, useRouter } from "vue-router";

    var user;
    var final;
    try {
        user = document.head.querySelector('meta[name="user"]');
        final = JSON.parse(user.content).id;
    } catch (e) {
        final = "";
    }

    const route = useRoute()
    const router = useRouter()
    const pageCount = ref(1)
    const libro = ref()
    const pdf = ref(null)
    const pdfLoaded = ref(false)
    const actualPage = ref(1)
    const loading = ref(true)

    const http = inject('http', axios.create({
        baseURL: 'http://127.0.0.1:8000/api/',
    }))
  
    const getLibro = () => {
        http.get('libros/' + route.params.id)
            .then(res => libro.value = res.data)
    }

    const getActualPage = () =>{
        http.post('library/page',{
            id_usuario: final,
            id_libro: route.params.id
        })
            .then(res => actualPage.value = res.data)
            .finally(() => loading.value = false)
    }

    const clickedDownload = (libro) => {
        const url = `https:ads-proyectofinal.s3.sa-east-1.amazonaws.com/pdf/DÍA 5 - SEMANA 16 - CIENCIA.pdf`
      try {
        axios.get(url,{ responseType: 'blob' })
        .then(response => {
        const blob = new Blob([response.data], { type: 'application/pdf' })
        const link = document.createElement('a')
        link.href = URL.createObjectURL(blob)
        link.download = 'download'
        link.click()
        URL.revokeObjectURL(link.href)
      }).catch(console.error)
      } catch(err) {
        console.log({ err })
      }
    }

    const finishBook = (libro) =>{
        http.patch('library/complete',{
            id_usuario: final,
            id_libro: route.params.id
        }).then(()=>router.push('/libreria'))
    }

    watch(actualPage,()=>{
        http.patch('library/page',{
            id_usuario: final,
            id_libro: route.params.id,
            page: actualPage.value
        })
    })

    const handleDocumentParams = () =>{
        pageCount.value=pdf.value.pageCount
        pdfLoaded.value=true
    }

    onMounted(() => {
        getLibro()
        getActualPage()
    })
</script>