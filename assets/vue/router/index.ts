import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../../../../../../../Users/liapeyrard/Downloads/assets/vue/views/Home.vue";
import Informations from "../../../../../../../Users/liapeyrard/Downloads/assets/vue/views/Informations.vue";
import Photos from "../../../../../../../Users/liapeyrard/Downloads/assets/vue/views/Photos.vue";
import Contact from "../../../../../../../Users/liapeyrard/Downloads/assets/vue/views/Contact.vue";

Vue.use(VueRouter);

export default new VueRouter({
  mode: "history",
  linkActiveClass: "active", 
  linkExactActiveClass: "active", 
  routes: [
    {
      path: "/",
      name: "Accueil",
      component: Default
    },
    {
      path: "/informations",
      name: "Informations",
      component: Informations
    },
    {
      path: "/photos",
      name: "Photos",
      component: Photos
    },
    {
      path: "/contact",
      name: "Contact",
      component: Contact
    },
    {
      path: "*",
      redirect: "/"
    }
  ]
});