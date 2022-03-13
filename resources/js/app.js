// axios
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// components
import MainView from './MainView.vue';

//  PrimeVue
import PrimeVue from "primevue/config"
import BadgeDirective from 'primevue/badgedirective';

// css
import "primevue/resources/themes/saga-blue/theme.css" // テーマ
import "primevue/resources/primevue.min.css" // ベース
import "primeicons/primeicons.css" // アイコン
import "primeflex/primeflex.css" // primeflex

// fontawsome
import "@fortawesome/fontawesome-free/js/fontawesome";
import "@fortawesome/fontawesome-free/js/brands";
import "@fortawesome/fontawesome-free/js/solid";
import "@fortawesome/fontawesome-free/js/regular";

import { createApp } from 'vue';
import axios from 'axios';

const app = createApp({
    components: {
        MainView,
    }
})

app.mount('#app');
app.use(PrimeVue);
app.directive('badge', BadgeDirective);
