<template>
    <form class="form">
        <h2>Add client</h2>
        <p type="Nombres:"><input placeholder="Indique su nombre completo ..."></p>
        <p type="Correo Electronico:"><input placeholder="Escriba su correo ..."></p>
        <p type="Telefono:"><input placeholder="Indique su telefono ..."></p>
        <p type="Departamento:"><input placeholder="Indique su departamento ..."></p>
        <p type="Mensaje:"><input placeholder="Indique sus necesidades en este campo ..."></p>
        <div class="buttonCont">
            <button>Cancelar</button>
            <button>Confirmar</button>
        </div>
        <div class="botCont"> 
            <div>
                <span class="fa fa-phone"></span>034 666 333 222
            </div>
            <div>
                <span class="fa fa-envelope"></span>hola@LaMancha.com
            </div>            
        </div>
    </form>

</template>

<style scoped>
.form{
    background:white;
    margin:0;
    width: 500px;
    border-radius:8px;
    box-shadow: 0 0 40px -10px #000;
    margin:calc(50vh - 220px) auto;
    padding: 20px 30px;
    max-width: calc(100vw -40px);
    box-sizing: border-box;
    font-family: "Montserrat",sans-serif;
    position:relative; 
}
h2{
    margin:10px 0;
    padding-bottom: 10px;
    width: 180px;
    color: black;
    border-bottom: 3px solid black;
}
input{
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    background: none;
    border:0;
    font-family: "Montserrat",sans-serif;
    transition: all .3s;
    border-bottom: 2px solid grey;
}
input:focus{
    border-bottom: 2px solid lightblue;
}
p:before{
    content:attr(type);
    display:block;
    margin:28px 0 0;
    font-size: 14px;
    color:black;
}
button{
    padding: 8px 12px;
    margin:8px 0 0;
    font-family: "Montserrat",sans-serif;
    border:2px solid gray;
    background: 0;
    color:black;
    cursor:pointer;
    transition: all .3s;
    align-content: center;
}
button:hover{
    background: gray;
    color: white;
}

.buttonCont{
    display: flex;
    justify-content: center;
    gap:10px;
    margin: 20px;
}

.botCont{
    display: flex;
    justify-content: space-between;
}

body{
    background:white;
}
/* .form .btn1{
    margin-right: 10%;
    margin-top: 7%;
}
    .form .btn2{
    margin-right: 15%;
    margin-top: 7%;
}     */
</style>