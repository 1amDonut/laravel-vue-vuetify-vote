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
              <tr v-for="item in visiblePages" :key="item.title">
                <td class="headline">{{ item.title }}</td>
                <td class="headline">{{ item.content }}</td>
              </tr>
            </tbody>

          </template>

        </v-simple-table>
        <center><span class="headline" v-if="rows.length==0">無任何最新消息</span></center>
      </v-col>
    </v-row>


    <v-row>
      <v-pagination v-model="page" :length="Math.ceil(rows.length/perPage)"></v-pagination>

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
  export default {
    data() {
      return {
        page: 1, //目前頁碼
        perPage: 4, //一頁顯示幾筆資料

        rows: [{
            title: '1',
            content: 'this is a content'
          }, {
            title: '2',
            content: 'this is a content'
          },
          {
            title: '3',
            content: 'this is a content'
          }, {
            title: '4',
            content: 'this is a content'
          }, {
            title: '5',
            content: 'this is a content'
          }, {
            title: '6',
            content: 'this is a content'
          }, {
            title: '7',
            content: 'this is a content'
          }, {
            title: '8',
            content: 'this is a content'
          }, {
            title: '9',
            content: 'this is a content'
          }, {
            title: '10',
            content: 'this is a content'
          },
        ],
        countOfPage: 5,
        currPage: 1,
        filter_name: '',
        news: [{
          title: 'test',
          content: 'this is a content'
        }, {
          title: 'test',
          content: 'this is a content'
        }]
      }
    },
    computed: {
      filteredRows: function () {
        // 因為 JavaScript 的 filter 有分大小寫，
        // 所以這裡將 filter_name 與 rows[n].name 通通轉小寫方便比對。
        // var filter_name = this.filter_name.toLowerCase();

        // 如果 filter_name 有內容，回傳過濾後的資料，否則將原本的 rows 回傳。
        return this.rows;
      },
      pageStart: function () {
        return (this.currPage - 1) * this.countOfPage;
      },
      totalPage: function () {
        return Math.ceil(this.filteredRows.length / this.countOfPage);
      },
      visiblePages() {
        return this.rows.slice((this.page - 1) * this.perPage, this.page * this.perPage)
      }
    },
    methods: {
      setPage: function (idx) {
        if (idx <= 0 || idx > this.totalPage) {
          return;
        }
        this.currPage = idx;
      },
      pages() {
        return this.pagination.rowsPerPage ? Math.ceil(this.rows.length / this.pagination.rowsPerPage) : 0
      },

    },
    components: {},
    name: 'News',
    created() {
      //  this.$emit(`update:layout`,Layout);
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