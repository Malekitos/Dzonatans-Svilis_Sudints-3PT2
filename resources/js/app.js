import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from "vue";


import central from './components/central.vue';
import removeTask from './components/removeTask.vue';
import removeGroup from './components/removeGroup.vue';
import loaderComponent from './components/loaderComponent.vue';
import permissionsGroup from './components/permissionsGroup.vue';
import addTask from './components/addTask.vue';
import editTask from './components/editTask.vue';




const app = createApp({});

app.component('loaderComponent', loaderComponent);
app.component('central', central);
app.component('removeTask', removeTask);
app.component('removeGroup', removeGroup);
app.component('permissionsGroup', permissionsGroup);
app.component('addTask', addTask);
app.component('editTask', editTask);



 window.apiUrl = window.location.origin + '/api/storeTask/';

app.mount("#app");
window.Alpine = Alpine;
Alpine.start();





