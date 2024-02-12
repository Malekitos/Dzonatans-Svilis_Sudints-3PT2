import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from "vue";
import central from './components/central.vue';

const app = createApp({
    components:{
        central,
    },
});

app.mount("#app");

window.Alpine = Alpine;

Alpine.start();
