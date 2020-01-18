<template>
  <v-container id="portfolioContainer" fluid>
    <v-app-bar :fixed="this.fixed" dark color="#485461" id="toolbar">
      <!-- Mobile -->
      <v-spacer v-if="$vuetify.breakpoint.smAndDown"></v-spacer>
      <v-toolbar-title v-if="$vuetify.breakpoint.smAndDown">Scott Norton</v-toolbar-title>
      <v-menu v-if="$vuetify.breakpoint.smAndDown" bottom right offset-x>
        <template v-slot:activator="{ on }">
          <v-btn dark icon v-on="on" style="position: absolute; right: 16px;">
            <v-icon>mdi-menu</v-icon>
          </v-btn>
        </template>
        <v-list>
          <v-list-item><v-list-item-title @click="scrollTo('home')">Home</v-list-item-title></v-list-item>
          <v-list-item><v-list-item-title @click="scrollTo('aboutContainer')">About</v-list-item-title></v-list-item>
          <v-list-item><v-list-item-title @click="scrollTo('expContainer')">Experience</v-list-item-title></v-list-item>
          <v-list-item><v-list-item-title @click="scrollTo('projectsContainer')">Projects</v-list-item-title></v-list-item>
          <v-list-item><v-list-item-title @click="scrollTo('contactContainer')">Contact</v-list-item-title></v-list-item>
        </v-list>
      </v-menu>

      <!-- Desktop -->
      <v-spacer v-if="!$vuetify.breakpoint.smAndDown"></v-spacer>
      <v-toolbar-items id="toolbar-items" v-if="!$vuetify.breakpoint.smAndDown">
        <v-btn text @click="scrollTo('home')">Home</v-btn>
        <v-btn text @click="scrollTo('aboutContainer')">About</v-btn>
        <v-btn text @click="scrollTo('expContainer')">Experience</v-btn>
        <v-btn text @click="scrollTo('projectsContainer')">Projects</v-btn>
        <v-btn text @click="scrollTo('contactContainer')">Contact</v-btn>
      </v-toolbar-items>
      <v-spacer />
    </v-app-bar>
    <About v-bind:style="this.fixed ? `margin-top: ${this.toolbarHeight}px;` : 'margin-top: 0;'" />
    <Experience />
    <Projects />
    <Contact />
    <Footer />
  </v-container>
</template>

<script>
import About from './About';
import Experience from './Experience';
import Projects from './Projects';
import Contact from './Contact';
import Footer from './Footer';
export default {
  name: 'Portfolio',
  components: {
    About,
    Experience,
    Projects,
    Contact,
    Footer
  },
  data () {
    return {
      fixed: false,
      threshold: undefined,
      toolbarHeight: undefined,
      scrollOptions : { }
    }
  },
  created() {
    window.addEventListener('scroll', this.checkScroll);
  },
  destroyed() {
    window.removeEventListener('scroll', this.checkScroll);
  },
  mounted () {
    this.threshold = document.getElementById('container').offsetHeight;
    this.toolbarHeight = document.getElementById('toolbar').offsetHeight;
  },
  methods: {
    scrollTo(target) {
      if (target === 'home') {
        this.$vuetify.goTo(0, this.scrollOptions);
      }
      else {
        let y = document.getElementById(target).getBoundingClientRect().top - document.body.getBoundingClientRect().top;
        let position = y - this.toolbarHeight;
        this.$vuetify.goTo(position, this.scrollOptions);
      }
    },
    // in case screen was resized
    checkScroll() {
      this.threshold = document.getElementById('container').offsetHeight;
      this.fixed = window.scrollY >= this.threshold;
      this.toolbarHeight = document.getElementById('toolbar').offsetHeight;
    }
  },
  computed: {
    style() {
      return {
        'margin-top': `${this.menuHeight}px`,
      }
    }
  }
}
</script>

<style>
#portfolioContainer {
  padding: 0;
}
</style>