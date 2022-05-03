require("./bootstrap");
require("../sass/app.scss");
import Vue from "vue";
import router from "./routes";
import BootstrapVue from "bootstrap-vue/dist/bootstrap-vue.esm";
import "bootstrap-vue/dist/bootstrap-vue.css";
import "bootstrap/dist/css/bootstrap.css";
import VueGoodTablePlugin from "vue-good-table";
import "vue-good-table/dist/vue-good-table.css";
import store from "./store";

Vue.config.productionTip = false;

Vue.use(VueGoodTablePlugin);
Vue.use(BootstrapVue);

window.Vue = require("vue");

// router
window.router = router;
window.Fire = new Vue();

const app = new Vue({
    el: "#app",
    router,
    store,
}).$mount("#app");
