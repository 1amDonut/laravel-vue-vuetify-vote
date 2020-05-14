<template>
  <v-container class=" px-auto">
    <v-row>
      <v-col cols="12">
        <div style="border-bottom: 2px solid #00387b" class="Block_incontent">
          <h1>最新消息</h1>
        </div>
      </v-col>
    </v-row>
    <v-row>


      <v-col cols="12">
        <!-- <table class="table table-condensed">
          <tr>
            <th>#</th>
            <th>name</th>
            <th>age</th>
            <th>gender </th>
          </tr>
          <tr v-for="(r, index) in filteredRows.slice(pageStart, pageStart + countOfPage) " :key="index">
            <td>{{ (currPage-1) * countOfPage + index + 1 }}</td>
            <td>{{ r.title }}</td>
            <td>{{ r.content }}</td>
          </tr>
        </table> -->

        <v-simple-table style="width:100%">
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left headline">時間</th>
                <th class="text-left headline">內容</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in visiblePages" :key="item.id">
                <td class="headline">{{ item.id }}</td>
                <td class="headline">{{ item.title }}</td>
              </tr>
            </tbody>
          </template>

        </v-simple-table>
        <!-- <center><span class="headline" v-if="news.todo.length==0">無任何最新消息</span></center> -->
      </v-col>
    </v-row>


    <v-row>
      <v-pagination v-model="page" :length="Math.ceil(news.length/perPage)"></v-pagination>

      <!-- <div class="text-center">
        <ul>
          <li v-bind:class="{'disabled': (currPage === 1)}" @click.prevent="setPage(currPage-1)"><a href="#">Prev</a>
          </li>
          <li v-for="n in totalPage" :key="n" v-bind:class="{'active': (currPage === (n))}" @click.prevent="setPage(n)">
            <a href="#">{{n}}</a></li>
          <li v-bind:class="{'disabled': (currPage === totalPage)}" @click.prevent="setPage(currPage+1)"><a
              href="#">Next</a></li>
        </ul>
      </div> -->
    </v-row>
  </v-container>
</template>

<script>
  import {
    mapState,
  } from "vuex";
  export default {
    data() {
      return {
        // 目前頁碼
        page: 1,
        // 一頁顯示幾筆
        perPage: 10,
        rows: [],
        countOfPage: 5,
        currPage: 1,
        filter_name: '',
      }
    },
    computed: {

      ...mapState({
        news: state => state.news.todo
      }),

      visiblePages(state) {
        console.log(state.news);
        return state.news.slice((this.page - 1) * this.perPage, this.page * this.perPage)
      }

    },
    methods: {},
    components: {},
    name: 'News',
    created() {
      //  this.$emit(`update:layout`,Layout);
      this.$store.dispatch("GET_NEWS");
    }
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