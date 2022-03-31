<template>
  <div class="flex flex-col">
    <h1>Hello</h1>
    <div id="nav">
      <router-link to="/home">Accueil</router-link> |
      <router-link to="/informations">Informations</router-link> |
      <router-link to="/photos">Photos</router-link> |
      <router-link to="/contact">Contact</router-link> |
    </div>
    <router-view class="h-full" />

  </div>
</template>

<script>

import {RouterView} from 'vue-router'

export default {
  components : {
    RouterView
  }
};
</script>
