<template>
  <img
    :src="`/build/images/` + photo.src"
    :title="photo.title"
    :alt="photo.title"
  >
</template>

<script >



export default {
  name: "Photo",
  props: {
    photo: {
      type: Object,
      default() {
        return {}
      }
    },
  }
};
</script>
