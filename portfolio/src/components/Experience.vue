<template>
  <v-container id="expContainer" fluid>
    <div class="expTitle">Experience</div>
    <v-timeline align-top :dense="$vuetify.breakpoint.smAndDown">
      <v-timeline-item
        v-for="(item, i) in items"
        :key="i"
        color="#28313b"
        :icon="item.icon"
        fill-dot
        large
      >
        <template v-slot:opposite align-top>
          <span
            class="time"
            v-text="item.time"
          ></span>
        </template>
        <v-card color="#485461" dark>
          <v-card-title class="title">{{ item.title }}</v-card-title>
          <v-card-text class="white text--primary" style="padding-top: 10px; padding-bottom: 10px;">
            <p style="margin-bottom: 0;">{{ item.description }}</p>
          </v-card-text>
        </v-card>
      </v-timeline-item>
    </v-timeline>
  </v-container>
</template>

<script>
export default {
  name: 'Experience',
  props: {
    source: String,
  },
  data () {
    return {
      items: [
        {
          title: 'Software Engineer - ADP',
          description: 'Current position at ADP.',
          time: 'February 2020 - Current',
          icon: 'mdi-star',
          color: 'red lighten-2',
          fontColor: 'red darken-3'
        },
        {
          title: 'Software Engineer - CoEnterprise',
          description: `Extended work on the ADP MFT project (below) as an independent
                        contractor for CoEnterprise with the same team and responsibilities.`,
          time: 'September 2019 - February - 2020',
          icon: 'mdi-briefcase',
          color: 'blue darken-4'
        },
        {
          title: 'Project Manager Fellow - Verizon 5G Labs',
          description: `Led a team of myself and four graduate computer science students at
                        Verizon 5G Labs for college credit. Our team developed a computer vision
                        pipeline to train and use a model to recognize objects from a live video
                        stream. Responsible for leading meetings, organizing tasks/roles,
                        managing risk, and contributing to the development of the project`,
          time: 'September 2019 - December 2019',
          icon: 'mdi-school',
          color: 'grey darken-4'
        },
        {
          title: 'Software Engineering Internship - ADP',
          description: `Worked on an Agile DevOps team to design and implement an online
                        user interface for ADP’s managed file transfer (MFT). Work consisted
                        of full stack development on a middleware user interface.`,
          time: 'May 2019 - August 2019',
          icon: 'mdi-briefcase',
          color: 'red lighten-2'
        },
        {
          title: 'B.S. in Computer Science - New Jersey Institue of Technology',
          description: 'GPA: 3.4',
          icon: 'mdi-school',
          color: 'red lighten-2',
          time: 'January 2017 - December 2019'
        }
      ]
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
}

.time {
  font-size: 20px;
}
</style>