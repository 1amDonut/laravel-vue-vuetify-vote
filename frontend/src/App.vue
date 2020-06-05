<template>
  <component :is="layout">
    <router-view :layout.sync="layout" />
    <Snackbar></Snackbar>
  </component>
</template>
<style scoped>
#app {
  font-family: 微軟正黑體 !important;
}
</style>
<script>
import Snackbar from "./components/snackbar";
import "@/assets/css/app.scss";
const default_layout = "default";
export default {
  name: "App",
  computed: {
    layout() {
      return (this.$route.meta.layout || default_layout) + "-layout";
    }
  },
  components: {
    Snackbar
  },
  data: () => ({})
};
</script>