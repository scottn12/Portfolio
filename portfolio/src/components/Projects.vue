<template>
  <v-container id="projectsContainer" fluid>
    <div class="projectsTitle">Projects</div>
    <v-container class="gridContianer">
      <v-row justify="center">
        <v-card ripple class="projectCard" href="https://github.com/scottn12/ScottBot" target="_blank">
          <v-img
            height="200px"
            width="200px"
            src="../assets/ScottBot.jpg"
          >
          </v-img>
          <v-card-title class="justify-center">ScottBot</v-card-title>
        </v-card>
        <v-card ripple class="projectCard" href="https://github.com/scottn12/MagicMirror" target="_blank">
          <v-img
            height="200px"
            width="200px"
            src="../assets/MagicMirror.jpeg"
          >
          </v-img>
          <v-card-title class="justify-center">Magic Mirror</v-card-title>
        </v-card>
        <v-card ripple class="projectCard" href="https://github.com/scottn12/AttentionButton" target="_blank">
          <v-img
            height="200px"
            width="200px"
            src="../assets/AttentionButton.jpg"
          >
          </v-img>
          <v-card-title class="justify-center">AttentionButton</v-card-title>
        </v-card>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
export default {
  name: 'Projects',
  props: {
    source: String,
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