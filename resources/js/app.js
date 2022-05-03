require("./bootstrap");
require("../sass/app.scss");
import Vue from "vue";
import router from "./routes.js";
import BootstrapVue from "bootstrap-vue/dist/bootstrap-vue.esm";
import "bootstrap-vue/dist/bootstrap-vue.css";
import "bootstrap/dist/css/bootstrap.css";
import VueGoodTablePlugin from "vue-good-table";
import "vue-good-table/dist/vue-good-table.css";
import { BFormFile } from "bootstrap-vue";
Vue.config.productionTip = false;

Vue.component("b-form-file", BFormFile);
Vue.use(VueGoodTablePlugin);
Vue.use(BootstrapVue);

window.Vue = require("vue");

// router
window.router = router;
window.Fire = new Vue();

const app = new Vue({
    el: "#app",
    router,
}).$mount("#app");
