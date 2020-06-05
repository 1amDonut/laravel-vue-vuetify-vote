import Vue from 'vue'
import VueRouter from 'vue-router'
import News from '../views/News.vue'
import Vote from '../views/Vote.vue'
import article from '../views/Article.vue'
import dashboard from '../views/Dashboard.vue'
import voting from '../views/Voting.vue'
import Verification from '../views/Verification.vue'
import New from '../views/New.vue'
import Activity from '../views/Activity.vue'
import project from '../views/Project.vue'
// 驗證資料格式欄位
import { ValidationProvider } from 'vee-validate';
Vue.use(VueRouter, ValidationProvider)

const routes = [{
  // 首頁
  path: '/',
  name: 'home',
  meta: {
    layout: 'default'
  },
  component: News
},
{
  path: '/about',
  name: 'about',
  // route level code-splitting
  // this generates a separate chunk (about.[hash].js) for this route
  // which is lazy-loaded when the route is visited.
  //component: () => import( /* webpackChunkName: "about" */ '../views/About.vue')
},
{
  // 投票活動
  path: '/vote',
  name: 'vote',
  meta: {
    layout: 'default'
  },
  component: Vote
},
{
  path: '/article/:id',
  name: 'article',
  meta: {
    layout: 'default'
  },
  component: article
},
{
  // 控制板
  path: '/dashboard',
  name: 'dashboard',
  meta: {
    layout: 'Admin'
  },
  component: dashboard
},
{
  // 投票頁面
  path: '/voting/:id',
  name: 'voting',
  meta: {
    layout: 'default'
  },
  component: voting
},

{
  path: '/getTicket',
  name: 'getTicket',
  component: Verification,
},
{
  // 建立投票頁面
  path: '/new',
  name: 'new',
  meta: {
    layout: 'Admin'
  },
  component: New
},
//設定頁面
{
  path: '/Activity/:id',
  name: 'Activity',
  meta: {
    layout: 'Admin'
  },
  component: Activity
},
{
  path: '/project',
  name: 'project',
  meta: {
    layout: 'Admin'
  },
  component: project
}, { path: '*', redirect: '/' }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router