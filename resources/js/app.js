import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from "vue";


import central from './components/central.vue';
import removeTask from './components/removeTask.vue';
import removeGroup from './components/removeGroup.vue';
import loaderComponent from './components/loaderComponent.vue';



const app = createApp({});

app.component('loaderComponent', loaderComponent);
app.component('central', central);
app.component('removeTask', removeTask);
app.component('removeGroup', removeGroup);


 window.apiUrl = window.location.origin + '/api/storeTask/';

app.mount("#app");
window.Alpine = Alpine;
Alpine.start();





