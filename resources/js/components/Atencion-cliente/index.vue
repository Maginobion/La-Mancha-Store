<template>
    <div>
        <div>
            <img src="../../../../public/images/atencioncliente.jpg" alt="imgRedes" class="topImg">
        </div>
        <div class="cont">
            <div>
                <p>
                    Estimado lector, ponemos a tu disposición nuestros canales de
                    atención, a través de los cuales responderemos tus consultas sobre: ---->>>
                </p>
                <ul>
                    <li>El estado de su compra en línea.</li>
                    <li>Dudas sobre el proceso de compra.</li>
                    <li>Stock de productos en web y librerías físicas.</li>
                    <li>Sugerencias y Reclamos.</li>
                </ul>
            </div>
            <img src="../../../../public/images/social.jpeg" alt="imgRedes" class="img">
        </div>
        <div class="aviso">
            Nuestro horario de atención es de lunes a sábado de 10:00am a 5:00pm, <br/>
            no contamos con atención los días domingo ni feriados.
        </div>            
    </div>
</template>

<style scoped>

.totalCont{
    position: relative;
}

.cont{
    display: flex;
    justify-content: center;
    margin-top: 50px;
    gap: 80px;
}

.cont>div>p{
    width: 580px;
}

.topImg{
    width: 100%;
}

.img{
    width: 500px;
}

ul {
  list-style: none;
  margin-left: -15px; /* Remove default bullets */
}

ul li::before {
  content: "\2022";  /* Add content: \2022 is the CSS Code/unicode for a bullet */
  color: blue; /* Change the color */
  font-weight: bold; /* If you want it to be bold */
  display: inline-block; /* Needed to add space between the bullet and the text */
  width: 1em; /* Also needed for space (tweak if needed) */
  margin-left: -1em; /* Also needed for space (tweak if needed) */
}

.aviso{
    margin: auto;
    text-align: center;
    background-color: #FFC000;
    color: #001491;
    width: 600px;
    border-radius: 25px;
    margin-top: 50px;
    padding: 10px;
    margin-bottom: 100px;
}

</style>

<script>
export default {
  components:{ 

    },
}
</script>
