<template>
  <v-container id="aboutContainer" fluid>
    <!-- Desktop -->
    <v-row v-if="!$vuetify.breakpoint.xsOnly" align="center">
      <v-col style="max-width: 30%;">
        <v-img aspect-ratio="1" class="profilePicture" src="../assets/profilepic.jpg"></v-img>
      </v-col>
      <v-col style="padding-left: 30px; padding-top: 40px;">
        <div class="aboutHeader">
          About Scott
        </div>
        <div class="mainText">
          I am a software engineer experienced in full stack web development and object-oriented programming.
          <br>
          I love to learn about and implement new techonologies, as well as design and develop applications to help people.
        </div>
        <!-- <div class="skillsTitle">Skills</div>
        <v-row>
          <v-col>Programming Languages</v-col>
          <v-col>Front-End Frameworks</v-col>
          <v-col>Back-End Frameworks</v-col>
          <v-col>Other</v-col>
        </v-row> -->
      </v-col>
    </v-row>
    
    <!-- Mobile -->
    <div v-if="$vuetify.breakpoint.xsOnly" class="mobileContainer">
      <v-img style="max-width: 100%;" aspect-ratio="1" class="profilePicture" src="../assets/profilepic.jpg"></v-img>
      <div class="aboutHeaderMobile">About Scott</div>
      <div class="mainText">
        I am a software engineer experienced in full stack web development and object-oriented programming.
        <br>
        I love to learn about and implement new techonologies, as well as design and develop applications to help people.
      </div>
      <!-- <div class="skillsTitle">Skills</div>
      <v-row>
        <v-col>Programming Languages</v-col>
        <v-col>Front-End Frameworks</v-col>
        <v-col>Back-End Frameworks</v-col>
        <v-col>Other</v-col>
      </v-row> -->
    </div>
  </v-container>
</template>

<script>
export default {
  name: 'About',
  props: {
    source: String,
  }
}
</script>

<style> 
#aboutContainer {
  padding-left: 45px;
  padding-right: 45px;
}

.mobileContainer {
  text-align: center;
}

.profilePicture {
  border-radius: 100%;
}

.aboutHeader {
  font-size: 38px;
  font-weight: 500;
  padding-bottom: 10px;
}

.aboutHeaderMobile {
  padding-top: 10px;
  font-size: 32px;
  font-weight: 500;
}

.skillsTitle {
  padding-top: 16px;
  padding-bottom: 10px;
  font-size: 30px;
  font-weight: 500;
}
</style>