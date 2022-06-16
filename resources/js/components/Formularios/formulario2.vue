<template>
    <div class="contenedor" style=" margin-bottom: 10%">
        <form action="" class="form" style="height:640px">
            <div class="form-header">
                <h1 class="form-title">E<span>dit Client</span></h1>

            </div>
            <label for="nombre" class="form-label">Nombres:</label>
            <input type="text" id="nombre" class="form-input" placeholder="Escriba su nombre">

            <label for="correo" class="form-label">Correo Electronico:</label>
            <input type="email" class="form-input" id="correo" placeholder="Escriba su correo">

            <label for="direccion" class="form-label">Telefono:</label>
            <input type="text" class="form-input" id="direccion" placeholder="Escriba su telefono">

             <label for="direccion" class="form-label">Departamento:</label>
            <input type="text" class="form-input" id="direccion" placeholder="Escriba su departamento">

            <label for="mensaje" class="form-label">Mensaje:</label>
            <textarea id="mensaje" class="form-textarea" placeholder="Escriba su mensaje"></textarea>

            <input type="submit" class="btn-submit" value="Confirmar"><br> <br> 
            <input type="submit" class="btn-submit" value="Cancelar">
        </form>

    </div>
</template>

<style>
*{
    margin: 0;
    padding: 0;
    -webkit-box-sizing:border-box ;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    
}
.contenedor .form .form-header .form-title{
    font-weight: normal;
    font-family: sans-serif;
    color:#ff851b;
    text-align: center;
    padding: 14px 0;
}
.contenedor .form .form-header .form-title span{
    color:#fff;
}
.contenedor .form{
    background: rgba(0,0,0,.6);
    width: 90%;
    max-width: 650px;
    margin: auto;
    padding: 5px 35px;
    margin-top: 30px;
    padding-bottom:30px;
    border-radius: 3px;
}
.contenedor .form .form-label{
    display:block;
    color: #ff851b;
    font-size: 16px;
    font-family: Roboto;
    position: relative;
}
.contenedor .form .form-input, .form-textarea{
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
   .contenedor .form .form-textarea{
       resize:vertical;
       max-height: 100px;
       min-height:50px;
   }
   .contenedor .form .btn-submit {
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
.contenedor .form .btn-submit:hover{
    background: #F29718;
}
body{
    background-size:cover ;
    background-attachment: fixed;
}
</style>