<template>
  <div>
    <!-- class="fill-height" 版面垂直致中 -->
    <v-container class="fill-height" fluid>
      <v-row align="center" justify="center">
        <v-col class="text-center">
          <div class="content">
            <!-- 標題列 -->
            <v-flex xs-12>
              <div class="Block_incontent">
                <h1>問卷總覽</h1>
              </div>
              <hr />
              <v-row>
                <v-spacer></v-spacer>
                <v-spacer></v-spacer>
                <v-col cols="6" class="text-right">
                  <v-btn :loading="loading3" :disabled="loading3" color="success" class="ma-2 white--text"
                    @click.stop="drawer =!drawer">
                    新增問卷
                    <!-- <v-icon right dark>mdi-microsoft-excel</v-icon> -->
                  </v-btn>
                </v-col>
              </v-row>
            </v-flex>
            <!-- 表格 -->
            <!-- <v-flex xs12>
              <v-card>
                <v-card-text>
                  <v-data-table :headers="headers" :items="desserts" :search="search"></v-data-table>
                </v-card-text>
              </v-card>
            </v-flex>-->
          </div>
        </v-col>
      </v-row>
      <v-row align="center" justify="center">
        <v-flex sm4 v-for="(item,index) in visiblePages" :key="index" pl-2 pr-2>
          <v-card class="mx-auto my-4" max-width="344" outlined>
            <v-list-item three-line>
              <v-list-item-content>
                <div class="overline mb-4">OVERLINE</div>
                <v-list-item-title class="headline mb-1">活動 {{item.title}}</v-list-item-title>
                <v-list-item-subtitle>
                  <div class="brief-footer">
                    <hr />
                    <ul>
                      <li>
                        <p>0</p>
                        <small>造訪</small>
                      </li>
                      <li>
                        <p>0</p>
                        <small>造訪</small>
                      </li>
                      <li class="reply-rate-wrapper">
                        <p>0%</p>
                        <small>回覆率</small>
                      </li>
                    </ul>
                  </div>
                </v-list-item-subtitle>
              </v-list-item-content>

              <!-- <v-list-item-avatar tile size="80" color="grey"></v-list-item-avatar> -->
            </v-list-item>

            <v-card-actions>
              <v-btn text>
                <router-link to="/voting" class="orange--text">編輯</router-link>
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-row>
      <!--pageination ---->
      <v-row>
        <v-pagination v-model="page" :length="Math.ceil(rows.length/perPage)"></v-pagination>
      </v-row>
    </v-container>
    <v-navigation-drawer v-model="drawer" absolute temporary clipped right width="70%"></v-navigation-drawer>
  </div>
</template>
<script>
  export default {
    data() {
      return {
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
    computed: {
      visiblePages() {
        return this.rows.slice(
          (this.page - 1) * this.perPage,
          this.page * this.perPage
        );
      }
    },
    components: {}
  };
</script>
<style scoped>
  /* 設定卡片詳細資料條形狀 */
  .brief-footer {
    cursor: pointer;
    padding: 0 8px 5px;
    overflow: hidden;
    color: #6b6b6b;
    margin-top: 5px;
  }

  /* 設定卡片 > ul li 間距 */
  .brief-footer ul li {
    width: 31%;
    height: auto;
    overflow: hidden;
    text-align: center;
    float: left;
    border-right: 1px dashed #d2d2d2;
  }

  /* 設定卡片 > li 取消最後一個元素邊框 */
  .brief-footer ul li:last-child {
    border-right: 0;
    width: 38%;
  }

  /* 設定卡片 > li元素字體大小 */
  .brief-footer p {
    font-size: 26px;
    line-height: 30px;
    margin-bottom: 0;
    margin-top: 10px;
  }
</style>