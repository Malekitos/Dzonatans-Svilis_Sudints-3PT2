import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from "vue";
import {LoadingPlugin} from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/css/index.css';

import central from './components/central.vue';
import loaderComponent from './components/loaderComponent.vue';
import taskComponent from './components/taskComponent.vue';


const app = createApp({
    components:{
        central,
        loaderComponent,
        taskComponent,
    },
});

 window.apiUrl = window.location.origin + '/api/storeTask/';

app.use(LoadingPlugin);
app.mount("#app");
window.Alpine = Alpine;
Alpine.start();

app.component('loader-component', loaderComponent)
app.component('taskComponent', taskComponent)

