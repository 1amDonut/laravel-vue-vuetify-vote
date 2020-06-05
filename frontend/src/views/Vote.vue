<template>
  <v-container class="px-auto">
    <v-row align="center" justify="center">
      <v-col cols="12">
        <div style="border-bottom: 2px solid #00387b" class="Block_incontent">
          <h1>投票活動</h1>
        </div>
      </v-col>
      <v-flex sm4 v-for="(item,index) in visiblePages" :key="index" pl-2 pr-2>
        <!-- <v-skeleton-loader :loading="loading" :transition="transition" type="list-item-two-line"> -->
        <v-card class="mx-auto my-4" max-width="344" outlined>
          <v-list-item three-line>
            <v-list-item-content>
              <!-- <div class="overline mb-4">OVERLINE</div> -->
              <v-list-item-title class="headline mb-1">{{item.activityName}}</v-list-item-title>
              <v-list-item-subtitle></v-list-item-subtitle>
            </v-list-item-content>

            <v-list-item-avatar tile size="80" color="grey"></v-list-item-avatar>
          </v-list-item>

          <v-card-actions>
            <v-btn text>
              <router-link :to="{path: '/article/' + item.idActivity}" class="orange--text">前往投票</router-link>
            </v-btn>
          </v-card-actions>
        </v-card>
        <!-- </v-skeleton-loader> -->
      </v-flex>
    </v-row>
    <!--pageination ---->
    <v-row>
      <v-pagination v-model="page" :length="Math.ceil(news .length/perPage)"></v-pagination>
    </v-row>
  </v-container>
</template>
<script>
import { mapState } from "vuex";
export default {
  data() {
    return {
      //   loading: true,
      // 目前頁碼
      page: 1,
      // 一頁顯示幾筆
      perPage: 6
    };
  },
  computed: {
    ...mapState({
      news: state => state.vote.activity,
      visiblePages(state) {
        return state.vote.activity.slice(
          (this.page - 1) * this.perPage,
          this.page * this.perPage
        );
      }
    })
  },
  created() {
    this.$store.dispatch("GET_ACTIVITY");
  },
  name: "Vote"
};
</script>
<style scoped>
.Block_incontent h1 {
  font-size: 1.375em;
  background-color: #fcce30;
  color: #333;
  padding: 6px 20px 6px 20px;
  position: relative;
  margin: 0 0 20px 0;
  clear: both;
  line-height: 140%;
  border-radius: 5px;
}
</style>