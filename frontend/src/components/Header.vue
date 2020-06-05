<template>
  <v-app-bar app clipped-left color="cyan">
    <!-- hidden-sm-and-up 設定是否隱藏選單icon -->
    <v-app-bar-nav-icon class @click.stop="drawer =!drawer"></v-app-bar-nav-icon>
    <v-toolbar-title class="white--text">臺中科大投票系統</v-toolbar-title>

    <v-spacer></v-spacer>
    <v-toolbar-items class="hidden-sm-and-down">
      <v-btn text>
        <router-link to="/" class="white--text">最新消息</router-link>
        <v-badge :content="messages" :value="messages" color="green" overlap>
          <v-icon large>mdi-email</v-icon>
        </v-badge>
      </v-btn>

      <v-btn text>
        <router-link to="../vote" class="white--text">投票</router-link>
      </v-btn>

      <v-btn text>
        <router-link to="../dashboard" class="white--text">後台管理</router-link>
      </v-btn>

      <v-btn text>
        <router-link to="../logout" class="white--text">登出</router-link>
      </v-btn>
    </v-toolbar-items>
  </v-app-bar>
</template>
<style scoped>
a {
  text-decoration: none;
}
</style>
<script>
export default {
  data() {
    return {
      messages: 2
    };
  }
};
</script>