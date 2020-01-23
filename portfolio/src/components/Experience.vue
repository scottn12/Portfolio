<template>
  <v-container id="expContainer" fluid>
    <div class="expTitle">Experience</div>

    <!-- Desktop Resume Button -->
    <div v-if="!$vuetify.breakpoint.xsOnly" style="text-align: center;">
      <v-btn color="#28313b" x-large dark @click="resumeOpen=true;">
        Full Resumé
      </v-btn>
    </div>
    <!-- Mobile Desktop Button -->
    <div v-if="$vuetify.breakpoint.xsOnly" style="text-align: left; margin-left: 4px;">
      <v-btn class="mx-2" color="#28313b" fab dark x-large @click="resumeOpen=true;">
        <v-icon>mdi-file-document</v-icon>
      </v-btn>
      <span style="margin-left: 10px; font-size: 22px;">Full Resumé</span>
    </div>

    <v-timeline :dense="$vuetify.breakpoint.smAndDown">
      <!-- General Cards -->
      <v-timeline-item
        v-for="(item, i) in items"
        :key="i"
        color="#28313b"
        :icon="item.icon"
        fill-dot
        large
      >
        <template v-slot:opposite>
          <span class="time">{{ item.time }}</span>
        </template>
        <v-card class="elevation-2">
          <v-card-title style="padding-bottom: 0; font-size: 24px; font-weight: 500;">{{ item.title }}</v-card-title>
          <v-card-text style="padding-bottom: 10px; padding-top: 10px; color: rgba(0, 0, 0, 0.70);">{{ item.description }}</v-card-text>
        </v-card>
      </v-timeline-item>
      <!-- Education Card -->
      <v-timeline-item
        color="#28313b"
        :icon="education.icon"
        fill-dot
        large
      >
        <template v-slot:opposite>
          <span class="time">{{ education.time }}</span>
        </template>
        <v-card class="elevation-2">
          <v-card-title style="padding-bottom: 0; font-size: 24px; font-weight: 500;">{{ education.title }}</v-card-title>
          <v-card-text style="padding-bottom: 10px; padding-top: 10px; color: rgba(0, 0, 0, 0.70);">
            GPA 3.4 | <a @click="courseClick()">{{ courseStatus }}</a>
            <v-expand-transition>
            <div v-if="courseStatus==='Hide Coursework'">
              Computer Science:
              <br>
              <div style="font-size: 11px;">
                Advanced Data Structures and Algorithms Design • Discrete Mathematics for Computer Science • Computer Organization and Architecture • 
                Programming Languages Concepts • Intensive Programming in Linux • Principles of Operating Systems • Introduction to Computer Networks • 
                Introduction to Artificial Intelligence • Android Application Development • Database System Design and Management • Guided Design in Software Engineering • Senior Project
              </div>
              Mathematics:
              <div style="font-size: 11px;">
                Calculus I, II, III • Differential Equations • Probability and Statistics • Linear Algebra • Mathematics of Finance 
              </div>
            </div>
            </v-expand-transition>
          </v-card-text>
        </v-card>
      </v-timeline-item>
    </v-timeline>
    
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
  name: 'Experience',
  props: {
    source: String,
  },
  components: {
    pdf
  },
  data () {
    return {
      items: [
        {
          title: 'Software Engineer | ADP',
          description: 'Current position at ADP. Hired onto the ADP MFT project (below) as a full time employee with increased responsiblities and long term support duties.',
          time: 'February 2020 - Current',
          icon: 'mdi-star',
        },
        {
          title: 'Software Engineer | CoEnterprise',
          description: `Extended work on the ADP MFT project (below) as an independent
                        contractor for CoEnterprise with the same team and responsibilities.`,
          time: 'September 2019 - February - 2020',
          icon: 'mdi-briefcase',
        },
        {
          title: 'Project Manager Fellow | Verizon 5G Labs',
          description: `Led a team of myself and four graduate computer science students at
                        Verizon 5G Labs for college credit. Our team developed a computer vision
                        pipeline to train and use a model to recognize objects from a live video
                        stream. Responsible for leading meetings, organizing tasks/roles,
                        managing risk, and contributing to the development of the project.`,
          time: 'September 2019 - December 2019',
          icon: 'mdi-school',
        },
        {
          title: 'Software Engineering Internship | ADP',
          description: `Worked on an Agile DevOps team to design and implement an online
                        user interface for ADP’s managed file transfer (MFT). Work consisted
                        of full stack development on a middleware user interface.`,
          time: 'May 2019 - August 2019',
          icon: 'mdi-briefcase',
        }
      ],
      education: {
        title: 'B.S. in Computer Science | New Jersey Institue of Technology',
        icon: 'mdi-school',
        time: 'January 2017 - December 2019'
      },
      courseStatus: 'Show Coursework',
      resumeOpen: false
    }
  },
  methods: {
    courseClick() {
      if (this.courseStatus === 'Show Coursework') {
        this.courseStatus = 'Hide Coursework';
      }
      else {
        this.courseStatus = 'Show Coursework';
      }
    },
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
#expContainer {
  min-height: 0;
  padding-left: 50px;
  padding-right: 50px;
}

.expTitle {
  font-size: 45px;
  text-align: center;
  padding-bottom: 12px;
}

.time {
  font-size: 18px;
}

/* For Mobile */
.v-card__text, .v-card__title {
  word-break: normal !important;
}

.downloadButton {
  padding-top: 10px;
  padding-left: 10px;
  position: absolute;
  z-index: 1001;
  display: flex;
}
</style>