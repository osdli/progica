import "tailwindcss/tailwind.css"

import Vue from "vue";
import App from "./App.vue";
import router from "../../../../../../Users/liapeyrard/Downloads/assets/vue/router";
import store from "../../../../../../Users/liapeyrard/Downloads/assets/vue/store";


new Vue({
  components: { App },
  template: "<App/>",
  router,
  store
}).$mount("#app");