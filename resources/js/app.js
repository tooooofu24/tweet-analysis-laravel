// require('./bootstrap');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import ExampleComponent from './components/ExampleComponent.vue';
import PrimeVue from "primevue/config"


import BadgeDirective from 'primevue/badgedirective';


import { createApp } from 'vue';

// css
import "primevue/resources/themes/saga-blue/theme.css" // テーマ
import "primevue/resources/primevue.min.css" // ベース
import "primeicons/primeicons.css" // アイコン
import "primeflex/primeflex.css" // primeflex

const app = createApp({
    components: {
        ExampleComponent
    }
})

app.mount('#app');
app.use(PrimeVue);
app.directive('badge', BadgeDirective);
