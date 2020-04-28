<template>
     <div>
          <v-row align="center" justify="center">
               <!-- slider-color tabs 底線 -->
               <!-- centered 置中 -->
               <v-tabs v-model="model" background-color="grey lighten-2" slider-color="yellow">
                    <v-tab v-for="(tab,index) in tabs" :key="index" @click="tabChange(tab.components)">
                         {{tab.name}}
                    </v-tab>

               </v-tabs>
               <v-tab-item>

               </v-tab-item>
          </v-row>
          <component :is="tabView"></component>

     </div>
</template>
<script>
     import Chart from '../views/Chart'
     export default {
          data() {
               return {
                    tabView: 'Chart',
                    tabs: [{
                         components: 'Chart',
                         name: '統計圖表'
                    }, {
                         components: 'details',
                         name: '明細匯出'
                    }, {
                         components: 'notification',
                         name: '系統通知'
                    }, {
                         components: 'edit',
                         name: '編輯'
                    }],
                    drawer: null,
                    items: [{
                              icon: "trending_up",
                              text: "Most Popular"
                         },
                         {
                              icon: "subscriptions",
                              text: "Subscriptions"
                         },
                         {
                              icon: "history",
                              text: "History"
                         },
                         {
                              icon: "featured_play_list",
                              text: "Playlists"
                         },
                         {
                              icon: "watch_later",
                              text: "Watch Later"
                         }
                    ],
                    // 預設從第幾頁開始
                    page: 1,
                    perPage: 6,
                    rows: [{
                              title: "1",
                              content: "this is a content"
                         },
                         {
                              title: "2",
                              content: "this is a content"
                         },
                         {
                              title: "3",
                              content: "this is a content"
                         },
                         {
                              title: "4",
                              content: "this is a content"
                         },
                         {
                              title: "5",
                              content: "this is a content"
                         },
                         {
                              title: "6",
                              content: "this is a content"
                         },
                         {
                              title: "7",
                              content: "this is a content"
                         },
                         {
                              title: "8",
                              content: "this is a content"
                         },
                         {
                              title: "9",
                              content: "this is a content"
                         },
                         {
                              title: "10",
                              content: "this is a content"
                         }
                    ]
               };
          },
          methods: {
               tabChange(component) {
                    let vm = this;
                    vm.tabView = component
               }
          },
          computed: {
               visiblePages() {
                    return this.rows.slice(
                         (this.page - 1) * this.perPage,
                         this.page * this.perPage
                    );
               }
          },
          components: {
               Chart
          }
     };
</script>
<style scoped>

</style>