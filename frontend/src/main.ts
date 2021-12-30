import { createApp } from 'vue';
import App from '@/App.vue';
import VueToast from 'vue-toast-notification';
import router from '@/router';
import store from '@/store';
import './index.css'
import 'vue-toast-notification/dist/theme-sugar.css';

createApp(App).use(router).use(VueToast).use(store).mount('#app');
