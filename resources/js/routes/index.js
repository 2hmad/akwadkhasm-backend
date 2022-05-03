import login from "../pages/login.vue";
import dashboard from "../pages/dashboard.vue";
import categories from "../pages/categories.vue";
import addCategory from "../pages/add-cat.vue";
import editCategory from "../pages/edit-cat.vue";
import coupons from "../pages/coupons.vue";
import addCoupons from "../pages/add-coupon.vue";
import stores from "../pages/stores.vue";
import addStore from "../pages/add-store.vue";

export default [
    {
        path: "/login",
        component: login,
        name: "login",
    },
    {
        path: "/",
        component: dashboard,
        name: "dashboard",
    },
    {
        path: "/categories",
        component: categories,
        name: "categories",
    },
    {
        path: "/add-category",
        component: addCategory,
        name: "Add Category",
    },
    {
        path: "/edit-category",
        component: editCategory,
        name: "Edit Category",
    },
    {
        path: "/coupons",
        component: coupons,
        name: "Coupons",
    },
    {
        path: "/add-coupon",
        component: addCoupons,
        name: "Add Coupons",
    },
    {
        path: "/stores",
        component: stores,
        name: "Stores",
    },
    {
        path: "/add-store",
        component: addStore,
        name: "Add Stores",
    },
];
