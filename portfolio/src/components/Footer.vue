<template>
  <v-container id="footerContainer" fluid>
      <v-icon @click="$vuetify.goTo(0, scrollOptions);" size="75" color="white">mdi-chevron-double-up</v-icon>
      <br>
    Scott Norton © 2020
  </v-container>
</template>

<script>
export default {
  name: 'Footer',
  props: {
    source: String,
  },
  data() {
    return {
      scrollOptions : {
        offset: 0, 
        duration: '1000', 
        easing: 'easeInCubic'
      }
    }
  }
}
</script>

<style>
#footerContainer {
  background-color: #28313b;
  color: white;
  text-align: center;
}
</style>