<template>
  <v-container id="aboutContainer" fluid>

    <v-row>
      <v-col style="max-width: 30%;">
        <v-img aspect-ratio="1" class="profilePicture" src="../assets/ScottBot.jpg"></v-img>
      </v-col>
      <v-col style="margin-left: 20px; margin-top: 30px;">
        <div class="aboutScott">About Scott</div>
        <div class="mainText">wew</div>
            <v-btn x-large icon @click="resumeOpen=true;">
      <v-icon>mdi-file-document</v-icon>
    </v-btn>
      </v-col>
    </v-row>

    <!-- PDF Preview -->
    <v-dialog
      id="dialog"
      style="z-index: 1000;" 
      overflowed 
      v-model="resumeOpen" 
      max-width="1000"
    >
      <span class="downloadButton">
        <v-btn @click="downloadResume()" :x-large="!$vuetify.breakpoint.xsOnly" :small="$vuetify.breakpoint.xsOnly" icon>
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
      resumeOpen: false
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
  margin-left: 30px;
}

.profilePicture {
  border-radius: 100%;
}

.aboutScott {
  font-size: 32px;
}

.downloadButton {
  padding-top: 10px;
  padding-left: 10px;
  position: absolute;
  z-index: 1001;
  display: flex;
}
</style>