<template>
<footer>
      <div class="contenedor-footer">
          <div class="content-foo">
          <p>
          <a href="#"><img src="images/mancha.jpeg" style="height: 80px; width:300px"> </a>
          </p>
          <div class="content-foo">
          <h4>Siguenos en redes sociales</h4>
          <a href="#"><img src="images/facebook.png"> </a>
          <a href="#"><img src="images/instagram.png"> </a>
          <a href="#"><img src="images/twitter.png"> </a>
          <a href="#"><img src="images/linkedin.png"> </a>
          <a href="#"><img src="images/youtube.png"> </a>
          
        </div>
         
        </div>
        <div class="content-foo">
          <h4>Sobre Nosotros</h4>
          <p>Quienes somos</p>
          <div class="content-foo">
          <h4>Política</h4>
          <p>Políticas de privacidad</p>
          <p>Políticas de cookies</p>
          <p>Términos y condiciones</p>
        </div>
        </div>
        <div class="content-foo">
          <h4>Categorías</h4>
          <p>Los mas vendidos</p>
          <p>Novedades</p>
          <p>Ficcion</p>
          <p>No ficcion</p>
          <p>Infantil</p>
          <p>Juvenil</p>
          <p>Smartplay</p>
        </div>
        
        <div class="content-foo">
          <h4>Contáctanos</h4>
          <p>Atención al cliente</p>
          <p>947-391799</p>
          <p>(llamadas y WhatsApp)</p>
          <p>(Lun-Sab 9 a.m a 5 p.m)</p>
          <p>atencion@crisol.com.pe</p>
          <p>Comprobante electrónico</p>
        </div>
        <div class="content-foo">
          <h4>Mi cuenta</h4>
          <p>Mis pedidos</p>
          <p>Mis deseos</p>
          <div class="content-foo">
          <h4>Medios de pago</h4>
          <a href="#"><img src="images/visa_i.png"> </a>
          <a href="#"><img src="images/america_i.png" style="margin-left:10px"> </a>
          <a href="#"><img src="images/cmr.png" style="height: 35px; width:50px  ;margin-left:10px;padding-bottom: 6px;"> </a>
          <div class="content-foo">
          <a href="#"><img src="images/efectivo.png" style="height: 35px; width:50px"> </a>
          <a href="#"><img src="images/master.png" style="height: 35px; width:50px ;margin-left:10px"> </a>
          <a href="#"><img src="images/dinner.png" style="height: 35px; width:50px ;margin-left:10px"> </a>
          </div>
        </div>

        </div>
        

      </div>
      <div class="titulo-final">
        &copy;LA MANCHA | INGENIERIA DE SISTEMAS
      </div>
    </footer>


</template>


<style scoped>
footer{
  display: block;
  min-height: 60px;
  background: #242323;
  text-align: center;
  padding-top: 15px;
  border-top: 5px solid #4e96a8;
  margin-top: 20px;
 
}

.contenedor-footer{
  display: flex;
  width: 100%;
  justify-content: space-evenly;
  margin: auto;
  padding-bottom: 50px;
  border-bottom: 2px solid #fff;
}

.content-foo{
  text-align: left;
}

.content-foo h4{
  color: #fff;
  border-bottom: 1px outset #af20d3;
  padding-bottom: 10px;
  font-size: 20px;
  text-shadow: 2px 2px 0 #000, 4px 4px 0 #000;
}

.content-foo p{
  color: #fff;
  font-size: 18px;
  font-weight: 600;
  text-shadow: 2px 2px 2px #1c6ea4;
}

/*.footer-social{
  color: #fff;
  font-size: 100%;
  padding: 2%;
}*/

.titulo-final{
  text-align: center;
  font-size: 24px;
  margin: 20px 0 0 0;
  color: #fff;
  padding: 5px;
  text-shadow: 2px 2px 0 #000, 4px 4px 0 #000;
}
</style>