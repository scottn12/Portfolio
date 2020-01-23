<template>
  <v-container id="container" class="fill-height" fluid>
    <v-layout align-center>
      <v-flex style="margin-bottom: 5em;">
        <transition name="slideRight">
          <div class="name" v-if="showName">Scott Norton</div>
        </transition>
        <div>
          <div class="subtitle" style="visibility: hidden;" v-if="!showSubtitle">Software Enginner</div>
        </div>
        <transition name="fade">
          <div class="subtitle" v-if="showSubtitle">Software Engineer</div>
        </transition>
        <transition name="slideLeft">
          <div class="icons" v-if="showIcons">
            <v-btn icon href="https://github.com/scottn12" target="_blank" style="margin-right: 10px;"><v-icon x-large color="white">mdi-github-circle</v-icon></v-btn>
            <v-btn icon href="https://www.linkedin.com/in/scott-norton/" target="_blank"><v-icon x-large color="white">mdi-linkedin-box</v-icon></v-btn>
          </div>
        </transition>
        <div class="iconHolder" v-if="!showIcons">
          <div style="visibility: hidden;" class="icons" v-if="!showIcons">
            <v-btn icon href="https://github.com/scottn12" target="_blank" style="margin-right: 10px;"><v-icon x-large color="white">mdi-github-circle</v-icon></v-btn>
            <v-btn icon href="https://www.linkedin.com/in/scott-norton/" target="_blank"><v-icon x-large color="white">mdi-linkedin-box</v-icon></v-btn>
          </div>
        </div>
        <div class="downIcons">
          <transition name="fadeFast">
            <span v-if="showDownIcons">
              <v-icon @click="$vuetify.goTo('#portfolioContainer', scrollOptions)" size="75" color="white">mdi-chevron-double-down</v-icon>
            </span>
          </transition>
          <transition name="fadeFast">
            <span v-if="showDownIcons">
              <v-icon @click="$vuetify.goTo('#portfolioContainer', scrollOptions)" size="75" color="white">mdi-chevron-double-down</v-icon>
            </span>
          </transition>
        </div>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  props: {
    source: String,
  },
  data () {
    return {
      showName: false,
      showSubtitle: false,
      showIcons: false,
      showDownIcons: false,
      target: null,
      scrollOptions : {
        offset: 0, 
        duration: '1000', 
        easing: 'easeInCubic'
      }
    }
  },
  mounted () {
    this.target = document.getElementById('portfolioContainer');
    this.showName = true;
    setTimeout( () => {
      this.showSubtitle = true;
    }, 2500);
    setTimeout( () => {
      this.showIcons = true;
    }, 1000);
    setTimeout( () => {
      this.showDownIcons = true;
    }, 3500);    
  }
}
</script>

<style>
#container {
  background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
  color: white;
  padding: 0;
  /* position: absolute;
  height: 100vh; */
  min-height: 100vh;
  position: relative;
}

.name {
  font-size: 40px;
  text-align: center;
}

.subtitle {
  /* font-size: 30px; */
  text-align: center;
  margin-bottom: 12px;
}

.icons {
  text-align: center;
  width: 100%;
}

.iconHolder {
  width: 100%;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 1s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}

.fadeFast-enter-active, .fadeFast-leave-active {
  transition: opacity .7s;
}
.fadeFast-enter, .fadeFast-leave-to {
  opacity: 0;
}

.slideLeft-leave-active, .slideLeft-enter-active {
  transition: 1s;
}
.slideLeft-enter {
  transform: translate(100%, 0);
}
.slideLeft-leave-to {
  transform: translate(-100%, 0);
}

.slideRight-leave-active, .slideRight-enter-active {
  transition: 1s;
}
.slideRight-enter {
  transform: translate(-100%, 0);
}
.slideRight-leave-to {
  transform: translate(100%, 0);
}

.downIcons {
  position: absolute;
  bottom: 3em;
  text-align: center;
  width: 100%;
  animation: updown 1.3s linear infinite;
}

@keyframes updown {
  0% {
    bottom: 3em;
  }
  50% {
    bottom: 5em;
  }
  100% {
    bottom: 3em;
  }
}

</style>