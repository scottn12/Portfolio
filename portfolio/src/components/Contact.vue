<template>
  <v-container id="contactContainer" fluid>    
    <v-card class="mx-auto" max-width="900px" id="card">
      <v-overlay :value="loading" absolute>
        <v-progress-circular indeterminate size="64"></v-progress-circular>
      </v-overlay>
      <v-card-title id="title" class="justify-center">Contact</v-card-title>
      <v-card-text class="justify-end">
        <v-alert
          dense
          text
          type="success"
          style="margin-top: 16px"
          v-model="success"
          transition="scale-transition"
          dismissible
        >
          Email sent successfully!
        </v-alert>
        <v-alert
          dense
          text
          type="error"
          style="margin-top: 16px"
          v-model="error"
          transition="scale-transition"
          dismissible
        >
          {{ errorMessage }}
        </v-alert>
        <v-form ref="form" v-model="valid">
          <v-text-field
            v-model="email"
            :rules="emailRules"
            label="Your E-mail Address"
            required>
          </v-text-field>
          <v-text-field
            style="padding-bottom: 10px;"
            v-model="subject"
            :counter="30"
            :rules="subjectRules"
            label="Subject"
            required>
          </v-text-field>
          <v-textarea
            v-model="message"
            :counter="500"
            :outlined="true"
            :rules="messageRules"
            label="Message"
            required>
          </v-textarea>
        </v-form>
      </v-card-text>
      <v-card-actions style="padding: 0;">
        <v-spacer></v-spacer>
        <v-btn
          style="margin-bottom: 20px; margin-right: 16px;"
          :disabled="!valid"
          class="white--text"
          color="success"
          @click="send"
        >
          Send
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-container>
</template>

<script>
export default {
  name: 'Contact',
  props: {
    source: String,
  },
  data: () => ({
    valid: false,
    success: false,
    error: false,
    email: '',
    emailRules: [
      v => !!v || 'E-mail is required',
      v => /.+@.+\..+/.test(v) || 'E-mail must be valid'
    ],
    subject: '',
    subjectRules: [
      v => !!v || 'Subject is required',
      v => (v && v.length <= 30) || 'Subject must be less than 30 characters'
    ],
    message: '',
    messageRules: [
      v => !!v || 'Message is required',
      v => (v && v.length <= 500) || 'Subject must be less than 500 characters'
    ],
    errorMessage: 'An error occured sending the email. Please try again later.',
    loading: false
  }),
  methods: {
    send() {
      // Reset Values
      this.success = false;
      this.error = false;
      this.errorMessage = 'An error occured sending the email. Please try again later.';
      this.loading = true;
      // Check if email already sent today
      if (this.getCookie('emailSent')) {
        this.error = true;
        this.errorMessage = 'You have already sent an e-mail already today. Please try again later.';
        this.loading = false;
        return;  // no send
      }
      var data = new FormData();
      data.append('email', this.email);
      data.append('subject', this.subject);
      data.append('message', this.message);
      fetch('https://scottnorton.tech/email.php', {
        method: 'POST',
        body: data
      })
      .then(response => response.json())
      .then((response) => {
        this.loading = false;
        if (response.success) {
          this.success = true;
          this.$refs.form.reset();
          document.cookie = 'emailSent=true; expires=(datetime + 1day)';  // Mark email sent
        }
        else {
          this.error = true;
        }
      })
      .catch(err => {
        err;  // linter pls
        this.error = true;
        this.loading = false;
      });
    },
    getCookie(name) {
      var dc = document.cookie;
      var prefix = name + "=";
      var begin = dc.indexOf("; " + prefix);
      if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
      }
      else {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
      }
      // because unescape has been deprecated, replaced with decodeURI
      //return unescape(dc.substring(begin + prefix.length, end));
      return decodeURI(dc.substring(begin + prefix.length, end));
    }
  }
}
</script>

<style>
#title {
  font-size: 25px;
  font-weight: 300;
  padding-bottom: 0;
}
</style>