import Vue from "vue";
import VueRouter from "vue-router";
import login from "../pages/login.vue";
import dashboard from "../pages/dashboard.vue";
import categories from "../pages/categories.vue";
import addCategory from "../pages/add-cat.vue";
import editCategory from "../pages/edit-cat.vue";
import coupons from "../pages/coupons.vue";
import addCoupons from "../pages/add-coupon.vue";
import stores from "../pages/stores.vue";
import addStore from "../pages/add-store.vue";
import account from "../pages/account.vue";
import store from "../store";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    scrollBehavior() {
        return { x: 0, y: 0 };
    },
    routes: [
        {
            path: "/login",
            component: login,
            name: "login",
            meta: {
                guest: true,
            },
        },
        {
            path: "/",
            component: dashboard,
            name: "dashboard",
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/categories",
            component: categories,
            name: "categories",
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/add-category",
            component: addCategory,
            name: "Add Category",
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/edit-category/:id",
            component: editCategory,
            name: "Edit Category",
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/coupons",
            component: coupons,
            name: "Coupons",
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/add-coupon",
            component: addCoupons,
            name: "Add Coupons",
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/stores",
            component: stores,
            name: "Stores",
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/add-store",
            component: addStore,
            name: "Add Stores",
            meta: {
                requiresAuth: true,
            },
        },
        {
            path: "/account",
            component: account,
            name: "My Account",
            meta: {
                requiresAuth: true,
            },
        },
    ],
});

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (store.getters.isAuthenticated) {
            next();
            return;
        }
        next("/login");
    } else {
        next();
    }
});

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.guest)) {
        if (store.getters.isAuthenticated) {
            next("/");
            return;
        }
        next();
    } else {
        next();
    }
});

export default router;
