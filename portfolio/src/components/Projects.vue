<template>
  <v-container id="projectsContainer" fluid>
    <div class="projectsTitle">Projects</div>
    <v-row>
      <v-card>
        <v-img
          src="../assets/ScottBot.PNG"
        >
        </v-img>

      </v-card>
    </v-row>
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
#projectsContainer {
  height: 500px;
}

.projectsTitle {
  font-size: 45px;
  text-align: center;
}

</style>