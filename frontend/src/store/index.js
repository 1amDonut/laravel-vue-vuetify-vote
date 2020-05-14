import Vue from 'vue'
import Vuex from 'vuex'
import news from "./modules/news"
import product from "./modules/new"
import admin from "./modules/admin"
Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    /**
     * 最新消息
     */
    news,
    /**
     * 建立投票
     */
    product,
    // 
    admin
  }
})
