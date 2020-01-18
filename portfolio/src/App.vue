<template>
  <v-app id="app" style="font-family: 'Montserrat', sans-serif;">
    <LandingPage />
    <Portfolio />
  </v-app>
</template>

<script>
import Portfolio from './components/Portfolio'
import LandingPage from './components/LandingPage'

export default {
  name: 'App',
  components: {
    Portfolio,
    LandingPage
  }
}
</script>

<style lang="scss">
@import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');

.v-application {
  font-family: 'Montserrat', sans-serif !important;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #080808;
  overflow: hidden; // for mobile
}
</style>