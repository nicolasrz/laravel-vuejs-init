require('./bootstrap');
import Vue from "vue";

import Home from "./components/Home.vue";


const home = new Vue({
    el: '#home',
    components: { Home }
});