<template>
  <v-container id="portfolioContainer" fluid>
    <v-app-bar :fixed="this.fixed" dark color="#485461" id="toolbar">
      <!-- Mobile -->
      <v-spacer v-if="collapse"></v-spacer>
      <v-toolbar-title v-if="collapse">Scott Norton</v-toolbar-title>
      <v-menu v-if="collapse" bottom right offset-x>
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
      <v-spacer v-if="!collapse"></v-spacer>
      <v-toolbar-items id="toolbar-items" v-if="!collapse">
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
      collapse: false,
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
    let toolbarItemsWidth = document.getElementById('toolbar-items').offsetWidth;
    if (toolbarItemsWidth >= window.innerWidth) {
      this.collapse = true;
    }
    else {
      this.collapse = false;
    }
    window.addEventListener('resize', this.onResize);
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
    checkScroll() {
      this.threshold = document.getElementById('container').offsetHeight;  // in case screen was resized
      this.fixed = window.scrollY >= this.threshold;
      this.toolbarHeight = document.getElementById('toolbar').offsetHeight; // in case screen was resized
    },
    onResize() {
      let toolbarItemsWidth = document.getElementById('toolbar-items').offsetWidth;
      if (toolbarItemsWidth >= window.innerWidth) {
        this.collapse = true;
      }
      else {
        this.collapse = false;  // not working
      }
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