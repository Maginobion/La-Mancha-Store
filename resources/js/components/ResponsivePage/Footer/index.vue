<template>
<footer>
      <div class="contenedor-footer">
        <div class="content-foo">
          <a href="/"><img src="images/mancha.jpeg" style="height: 80px; width:300px; margin-bottom: 24px;"> </a>
          <div class="content-foo">
            <h1>Síguenos en redes sociales</h1>
            <a href="#"><img src="images/facebook.png"> </a>
            <a href="#"><img src="images/instagram.png"> </a>
            <a href="#"><img src="images/twitter.png"> </a>
            <a href="#"><img src="images/linkedin.png"> </a>
            <a href="#"><img src="images/youtube.png"> </a>          
          </div>        
        </div>
        <div class="content-foo">
          <div class="content-foo">
            <h1>Sobre Nosotros</h1>
            <p>Quienes somos</p>
          </div>
          <div class="content-foo">
            <h1>Política</h1>
            <p>Políticas de privacidad</p>
            <p>Políticas de cookies</p>
            <p>Términos y condiciones</p>
          </div>
        </div>
        <div class="content-foo">
          <h1>Categorías</h1>
          <p>Los mas vendidos</p>
          <p>Novedades</p>
          <p>Ficcion</p>
          <p>No ficcion</p>
          <p>Infantil</p>
          <p>Juvenil</p>
          <p>Smartplay</p>
        </div>
        
        <div class="content-foo">
          <h1>Contáctanos</h1>
          <p>Atención al cliente</p>
          <p>947-391799</p>
          <p>(llamadas y WhatsApp)</p>
          <p>(Lun-Sab 9 a.m a 5 p.m)</p>
          <p>atencion@crisol.com.pe</p>
          <p>Comprobante electrónico</p>
        </div>
        <div class="content-foo">
          <div class="content-foo">
            <h1>Mi cuenta</h1>
            <p>Mis pedidos</p>
            <p>Mis deseos</p>
          </div>
          <div class="content-foo">
            <h1>Medios de pago</h1>
            <div class="content-foo">
              <a href="#"><img src="images/visa_i.png"> </a>
              <a href="#"><img src="images/america_i.png"> </a>
              <a href="#"><img src="images/cmr.png" style="height: 35px; width:50px;padding-bottom: 6px;"> </a>      
              <a href="#"><img src="images/efectivo.png" style="height: 35px; width:50px"> </a>
              <a href="#"><img src="images/master.png" style="height: 35px; width:50px"> </a>
              <a href="#"><img src="images/dinner.png" style="height: 35px; width:50px"> </a>
            </div>
          </div>
        </div>
      </div>
      <p class="titulo-final">
        ©	La Mancha | Ingeniería de Sistemas
      </p>
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
  margin-bottom: 16px;
}

.content-foo h1{
  color: #fff;
  border-bottom: 1px solid white;
  padding-bottom: 4px;
  margin-bottom: 8px;
  font-size: 20px;
}

.content-foo p{
  color: rgb(198, 205, 201);
  margin: 4px 0;
  font-size: 16px;
  font-weight: normal;
}

.titulo-final{
  text-align: center;
  font-size: 20px;
  color: #fff;
  padding: 10px;
}
</style>