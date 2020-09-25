import Vue from "vue";
import VueRouter from "vue-router";

import App from './App.vue';
Vue.use(VueRouter);


const router = new VueRouter({
    mode: "history",
    routes: [{
        path: "/",
        name: "app"
    }]
});

export default router;