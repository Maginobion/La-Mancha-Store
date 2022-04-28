require('./bootstrap');

import { createApp } from 'vue';

createApp({})
    .component('mensaje', require("./components/Mensaje.vue").default)
    .mount("#app");

export default {
    data() {
      return {
        message: 'Hello World!'
      }
    }
  }