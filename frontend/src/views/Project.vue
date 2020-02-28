<template>
     <div>

          <!-- class="fill-height" 版面垂直致中 -->
          <v-container class="fill-height" fluid>
               <v-row align="center" justify="center">
                    <v-col class="text-center">
                         
                         <v-sheet elevation="6">
                              <v-tabs background-color="white" color="cyan" next-icon="mdi-arrow-right-bold-box-outline"
                                   prev-icon="mdi-arrow-left-bold-box-outline" show-arrows>
                                   <v-tabs-slider color="cyan"></v-tabs-slider>
                                   <v-tab>
                                        統計圖表
                                   </v-tab>
                                   <v-tab>
                                        報表匯出
                                   </v-tab>
                              </v-tabs>
                         </v-sheet>

                         <div class="content">



                         </div>
                    </v-col>
               </v-row>
          </v-container>
     </div>
</template>
<script>
     export default {
          data() {
               return {

                    drawer: null,
                    items: [{
                              icon: 'trending_up',
                              text: 'Most Popular'
                         },
                         {
                              icon: 'subscriptions',
                              text: 'Subscriptions'
                         },
                         {
                              icon: 'history',
                              text: 'History'
                         },
                         {
                              icon: 'featured_play_list',
                              text: 'Playlists'
                         },
                         {
                              icon: 'watch_later',
                              text: 'Watch Later'
                         },
                    ],
               }
          },
          components: {}
     }
</script>