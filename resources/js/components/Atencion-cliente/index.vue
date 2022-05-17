<template>
    <div class="cont">
        <div>
            <p>
                Estimado lector, ponemos a tu disposición nuestros canales de
                atención a través de los cuales responderemos tus consultas sobre:
            </p>
            <ul>
                <li>El estado de su compra en línea.</li>
                <li>Dudas sobre el proceso de compra.</li>
                <li>Stock de productos en web y librerías físicas.</li>
                <li>Sugerencias y Reclamos.</li>
            </ul>
        </div>
        <img src="../../../../public/images/social.jpeg" alt="imgRedes" class="img">
        <footer></footer>
    </div>
</template>

<style scoped>

.cont{
    display: flex;
    justify-content: space-around;
}

.img{
    width: 500px;
}

ul {
  list-style: none; /* Remove default bullets */
}

ul li::before {
  content: "\2022";  /* Add content: \2022 is the CSS Code/unicode for a bullet */
  color: blue; /* Change the color */
  font-weight: bold; /* If you want it to be bold */
  display: inline-block; /* Needed to add space between the bullet and the text */
  width: 1em; /* Also needed for space (tweak if needed) */
  margin-left: -1em; /* Also needed for space (tweak if needed) */
}

</style>

<script>
import { defineComponent } from '@vue/composition-api'
import footer from './../Footer/footer.vue'


export default defineComponent({
  components: { footer },
})
</script>
