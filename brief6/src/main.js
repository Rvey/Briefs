import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './index.css'
import '../dist/tailwind.css'
import '../dist/style.css'
createApp(App).use(router).mount('#app')
