require('./bootstrap');
import App from './App.vue'

import vuetify from './plugins/vuetify';

import {createApp} from 'vue'

const app = createApp(App)

app.use(vuetify)

app.mount("#app")





