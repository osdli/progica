import { createRouter, createWebHistory } from "vue-router";
import Home from "./../views/Home.vue";
import Informations from "./../views/Informations.vue";
import Photos from "./../views/Photos.vue";
import Contact from "./../views/Contact.vue";


const router = createRouter({
  history: createWebHistory(),
  linkActiveClass: "active",
  linkExactActiveClass: "active",
  routes: [
    {
      path: "/home",
      name: "app_default",
      component: Home
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
    }
  ]
});

export default router