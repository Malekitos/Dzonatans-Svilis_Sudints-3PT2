import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

import example from "./components/example.vue"
import user from "./components/user.vue"

const app = createApp({
    components: {
        example, user,
    }
});

app.mount("#app");
