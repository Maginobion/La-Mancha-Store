<template>
    <form v-on:submit.prevent="submitForm" class="form" enctype="multipart/form-data">
        <div class="form-header">
            <h1 class="form-title">Add Libro</h1>
        </div>
        <label for="titulo" class="form-label">Titulo:</label>
        <input type="text" id="titulo" class="form-input" v-model="form.titulo" placeholder="Escriba el titulo">

        <label for="autor" class="form-label">Autor:</label>
        <input class="form-input" id="autor" v-model="form.autor" placeholder="Escriba el autor">

        <label for="editorial" class="form-label">Editorial:</label>
        <input class="form-input" id="editorial" v-model="form.editorial" placeholder="Escriba su telefono">

        <label for="descripcion" class="form-label">Descripcion:</label>
        <input class="form-input" v-model="form.descripcion" id="descripcion" placeholder="Escriba su descripción">

        <label for="caratula" class="form-label">Caratula:</label>
        <input type="file" class="form-file" @change="uploadImage" id="caratula" accept="image/png, image/jpeg">

        <label for="readable" class="form-label">Archivo:</label>
        <input type="file" class="form-file" @change="uploadFile" id="readable" accept=".pdf">

        <label for="precio" class="form-label">Precio:</label>
        <input type="number" id="precio" class="form-input" v-model="form.precio" placeholder="Escriba el precio">

        <label for="genero" class="form-label">Género:</label>
        <input id="genero" class="form-input" v-model="form.genero" placeholder="Escriba el genero">

        <input type="submit" class="btn-submit" value="Confirmar"><br> <br> 
    </form>
</template>

<script>

export default {
    data(){
        return{
            form:{
                titulo:'',
                autor:'',
                editorial:'',
                descripcion:'',
                precio:0,
                genero:'',
            },
            caratula: null,
            readable: null
        }
    },
    methods:{
        uploadImage(event) {
            this.caratula = event.target.files[0];
        },
        uploadFile(event) {
            this.readable = event.target.files[0];
        },
        submitForm(){
            if(this.form.titulo==='' || 
                this.form.autor==='' || 
                this.form.editorial==='' || 
                this.form.descripcion==='' || 
                this.form.genero==='' || 
                this.form.precio===0 ||
                this.image===null ||
                this.readable===null){
                console.log('Llena todo')
            }
            else{
                //agregar cada append
                const formData = new FormData();
                formData.append('titulo',this.form.titulo);
                formData.append('autor',this.form.autor);
                formData.append('editorial',this.form.editorial);
                formData.append('descripcion',this.form.descripcion);
                formData.append('precio',this.form.precio);
                formData.append('caratula',this.caratula, this.caratula.name);
                formData.append('readable',this.readable, this.readable.name);
                formData.append('genero',this.form.genero);               
                this.$http.post('libros',formData,{
                    headers:{
                        'Content-Type':'multipart/form-data'
                    }
                }).then(res => console.log(res))
                    .catch(err=>console.log(err))
                    .finally(()=>this.$router.push('/'))
            }          
        }
    }
}
</script>

<style scoped>

.form-header .form-title{
    font-weight: normal;
    font-family: sans-serif;
    color:#fff;
    text-align: center;
    padding: 14px 0;
}
.form-header::first-letter{
    color:#ff851b;
}
.form-header .form-title span{
    color:#fff;
}
.form{
    background: rgba(0,0,0,.6);
    width: 90%;
    max-width: 650px;
    margin: auto;
    padding: 5px 35px;
    margin-top: 30px;
    padding-bottom:30px;
    border-radius: 3px;
}
.form-label{
    display:block;
    color: #ff851b;
    font-size: 16px;
    font-family: Roboto;
    position: relative;
}
.form-input, .form-textarea{
    background: rgb(0, 0, 0,.7);
    border: none;
    outline:none;
    border-bottom: 2px solid #ff851b;
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 2px;
    font-size: 14px;
    color: #FFF;
    font-family: Roboto;
}
.form-file{
    margin: 0 0 10px 0;
}
.form-textarea{
    max-height: 100px;
    min-height:50px;
}
.btn-submit {
    width: 100%;
    font-family: Roboto;
    outline:none;
    background: #ff851b;
    font-size: 16px;
    border:none;
    color:#fff;
    padding: 15px 0;
    cursor: pointer;
    transition: all .5s ease;
}
.form .btn-submit:hover{
    background: #F29718;
}
</style>