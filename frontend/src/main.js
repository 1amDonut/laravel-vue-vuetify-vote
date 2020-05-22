import Vue from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify';
import Default from "./Layouts/Layout";
import Admin from "./Layouts/Admin.vue";
import CKEditor from '@ckeditor/ckeditor5-vue';

Vue.use(CKEditor);
Vue.component("default-layout", Default);
Vue.component("Admin-layout", Admin);
Vue.config.productionTip = false

new Vue({
  router,
  store,
  vuetify,
  CKEditor ,
  render: h => h(App)
}).$mount('#app')
