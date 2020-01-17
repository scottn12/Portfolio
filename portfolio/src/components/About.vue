<template>
  <v-container id="aboutContainer" fluid>
    <div class="aboutTitle">About Me</div>





    <v-btn x-large icon @click="resumeOpen=true;">
      <v-icon>mdi-file-document</v-icon>
    </v-btn>


    



    <!-- PDF Preview -->
    <v-dialog style="z-index: 1000;" overflowed v-model="resumeOpen" max-width="1000">
      <span class="downloadButton">
        <v-btn @click="downloadResume()" :x-large="largeIcon" :small="!largeIcon" icon>
          <v-icon>mdi-download</v-icon>
        </v-btn>
      </span>
      <pdf style="display:inline-block" src="./ScottNortonResume.pdf"></pdf>
    </v-dialog>
  </v-container>
</template>

<script>
import pdf from 'vue-pdf';
export default {
  name: 'About',
  props: {
    source: String,
  },
  components: {
    pdf
  },
  data() {
    return {
      resumeOpen: false,
      largeIcon: undefined
    }
  },
  mounted() {
    if (1000 >= window.innerWidth) {
      this.largeIcon = false;
    }
    else {
      this.largeIcon = true;
    }
  },
  methods: {
    downloadResume() {
      let link = document.createElement('a');
      link.href = './ScottNortonResume.pdf';
      link.download = 'ScottNortonResume.pdf';
      link.dispatchEvent(new MouseEvent('click'));
    }
  }
}
</script>

<style>
#aboutContainer {
  height: 500px;
}

.aboutTitle {
  font-size: 45px;
  text-align: center;
  padding-left: 15px;
}


.downloadButton {
  padding-top: 10px;
  padding-left: 10px;
  position: absolute;
  z-index: 1001;
  display: flex;
}
</style>