<template>
  <v-snackbar v-model="visible" :color="color" top>
    {{ this.$store.state.snackbar.msg }}
    <v-btn @click="snackbar = false">關閉</v-btn>
  </v-snackbar>
</template>
<script>
export default {
  computed: {
    visible() {
      return this.$store.state.snackbar.visible;
    },
    //  SET Snackbar status like success or error & info
    color() {
      return this.$store.state.snackbar.color;
    }
  },
  methods: {}
};
</script>