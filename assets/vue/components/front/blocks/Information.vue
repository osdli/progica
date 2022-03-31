<template>
  <div class="pt-12 pb-8 mt-6 bg-white rounded-lg shadow-2xl">
    <h3 class="mx-8 text-3xl font-extrabold tracking-tight text-gray-900">
      {{ name }}
    </h3>
    <div
      v-if="map"
      class="overflow-hidden self-end mt-6 w-full h-64 border-t border-b border-yellow-600 shadow-xl"
    >
      <Map />
    </div>
    <div v-if="!loading">
      <dl
        class="mx-8 mt-6 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:col-gap-6 sm:row-gap-12 lg:grid-cols-4 lg:col-gap-8"
      >
        <Feature
          v-for="feature in sortedFeatures"
          :key="feature"
          :title="feature.title"
          :desc="feature.message"
        />
      </dl>
    </div>

    <div
      v-else
      class="py-16 mx-auto w-16"
    >

        <title>Loader</title>
        <desc>Created with Sketch.</desc>

    </div>
  </div>
</template>

<script >
import Feature from "../Feature.vue";
import Map from "../Map.vue";



export default {
  name: "Information",
  components: {Feature, Map},
  props: {
    name: "",
    features: {},
    map: Boolean,
    loading: Boolean,
  },
  computed: {
    sortedFeatures() {
      return this.features.sort((a, b) => a.order - b.order);
    },
  }
};
</script>

<style>
#dots #dot1 {
  animation: load 1s infinite;
}

#dots #dot2 {
  animation: load 1s infinite;
  animation-delay: 0.2s;
}

#dots #dot3 {
  animation: load 1s infinite;
  animation-delay: 0.4s;
}

@keyframes load {
  0% {
    @apply opacity-0;
  }
  50% {
    @apply opacity-100;
  }
  100% {
    @apply opacity-0;
  }
}
</style>