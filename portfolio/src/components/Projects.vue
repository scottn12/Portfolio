<template>
  <v-container id="projectsContainer" fluid>
    <div class="projectsTitle">Projects</div>
    <v-container class="gridContianer">
      <v-row justify="center" no-gutters>
        <v-col cols="7" md="3" v-for="(item, i) in projects" :key="i">
          <v-card
            ripple 
            class="projectCard" 
            :href="item.link" 
            target="_blank"
            width="220px"
            height="375px"
          >
            <v-img
              height="200px"
              :src="getImg(item.img)"
            >
            </v-img>
            <v-card-title class="justify-center">{{ item.title }}</v-card-title>
            <v-card-text class="description">{{ item.description }}</v-card-text>
          </v-card>
        </v-col>
      </v-row>
      <div style="text-align: center;">(This website was also made from <a href="https://github.com/scottn12/Portfolio" target="_blank">scratch</a>!)</div>
    </v-container>
  </v-container>
</template>

<script>
export default {
  name: 'Projects',
  props: {
    source: String,
  },
  data() {
    return {
      projects: [
        {      
          title: 'Slippi Stats Online',
          img: 'Slippi.png',
          link: 'https://github.com/scottn12/ScottBot',
          description: 'Website designed to provide a way to analyze a large number of Slippi Online games at once.'
        },
        {
          title: 'ScottBot',
          img: 'ScottBot.jpg',
          link: 'https://github.com/scottn12/ScottBot',
          description: 'Dicsord Bot that provides quality of life commands, mini-games, and more.'
        },
        {
          title: 'MagicMirror',
          img: 'MagicMirror.jpeg',
          link: 'https://github.com/scottn12/MagicMirror',
          description: 'Code designed for a smart mirror display.'
        },
        {
          title: 'Attention Button',
          img: 'AttentionButton.jpg',
          link: 'https://github.com/scottn12/AttentionButton',
          description: 'Android application used to remotely notify if attention is needed.'
        },
      ]
    }
  },
  methods: {
    getImg(img) {
      return require('../assets/' + img);
    }
  }
}
</script>

<style>
.projectsTitle {
  font-size: 45px;
  text-align: center;
}

.gridContianer {
  max-width: 1000px;
}

.projectCard {
  margin-bottom: 15px;
}

.description {
  max-width: 220px;
  text-align: center;
}
</style>