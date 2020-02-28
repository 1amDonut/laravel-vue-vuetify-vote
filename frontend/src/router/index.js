import Vue from 'vue'
import VueRouter from 'vue-router'
import News from '../views/News.vue'
import Vote from '../views/Vote.vue'
import article from '../views/Article.vue'
import dashboard from '../views/Dashboard.vue'
import voting from '../views/Voting.vue'
import Verification from '../views/Verification.vue'
import New from '../views/New.vue'
import project from '../views/Project.vue'
import { ValidationProvider } from 'vee-validate';
Vue.use(VueRouter,ValidationProvider)

const routes = [{
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
  component: () => import( /* webpackChunkName: "about" */ '../views/About.vue')
},
{
  path: '/vote',
  name: 'vote',
  meta: {
    layout: 'default'
  },
  component: Vote
},
{
  path: '/article',
  name: 'article',
  meta: {
    layout: 'default'
  },
  component: article
},
{
  path: '/dashboard',
  name: 'dashboard',
  meta: {
    layout: 'Admin'
  },
  component: dashboard
},
{
  path: '/voting',
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
}, {
  path: '/new',
  name: 'new',
  meta: {
    layout: 'Admin'
  },
  component: New
}, {
  path: '/project',
  name: 'project',
  meta: {
    layout: 'Admin'
  },
  component: project
}
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router