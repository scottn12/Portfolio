<template>
  <v-container id="projectsContainer" fluid>
    <div class="projectsTitle">Projects</div>
    <v-container class="gridContianer">
      <v-row justify="center">
        <v-card
        v-for="(item, i) in projects"
        :key="i"
        ripple 
        class="projectCard" 
        :href="item.link" 
        target="_blank">
          <v-img
            height="200px"
            width="200px"
            :src="getImg(item.img)"
          >
          </v-img>
          <v-card-title class="justify-center">{{ item.title }}</v-card-title>
        </v-card>
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
          title: 'ScottBot',
          img: 'ScottBot.jpg',
          link: 'https://github.com/scottn12/ScottBot'
        },
        {
          title: 'MagicMirror',
          img: 'MagicMirror.jpeg',
          link: 'https://github.com/scottn12/MagicMirror'
        },
                {
          title: 'AttentionButton',
          img: 'AttentionButton.jpg',
          link: 'https://github.com/scottn12/AttentionButton'
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
  margin-left:15px;
  margin-right: 15px;
  margin-bottom: 15px;
}
</style>