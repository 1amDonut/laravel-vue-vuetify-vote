<template>
  <v-app>
    <div class="tabs">
      <!-- clipped-left 指定位于左侧的应用程序的 v-navigation-drawer 在应用程序栏下方 -->
      <Header></Header>
    </div>
    <v-content>
      <slot></slot>
    </v-content>
    <Footer></Footer>
  </v-app>
</template>
<style scoped>
a {
  text-decoration: none;
}
</style>
<script>
import Header from "../components/Header";
import Footer from "../components/Footer";
export default {
  components: {
    Footer,
    Header
  }
};
</script>