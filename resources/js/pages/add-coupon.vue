<template>
    <div id="dashboard-page">
        <Sidebar />
        <div class="container" style="margin-top: 3%">
            <form @submit.prevent="addCoupon">
                <div class="mb-3">
                    <label for="coupon" class="form-label">
                        عنوان الكوبون
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="coupon"
                        placeholder="خصم 50% علي جميع المنتجات"
                        v-model="form.title"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">النوع</label>
                    <select class="form-select" id="type" v-model="form.type">
                        <option value="coupon">كوبون</option>
                        <option value="offer">عرض</option>
                    </select>
                </div>
                <div class="mb-3" v-if="form.type == 'offer'">
                    <label for="offer-link" class="form-label">
                        رابط العرض
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="offer-link"
                        v-model="form.offer_link"
                        required
                    />
                </div>
                <div class="mb-3" v-if="form.type == 'coupon'">
                    <label for="coupon" class="form-label"> الكوبون </label>
                    <input
                        type="text"
                        class="form-control"
                        id="coupon"
                        v-model="form.coupon"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="store" class="form-label">المتجر</label>
                    <select class="form-select" id="store" v-model="form.store">
                        <option
                            v-for="store in stores"
                            :key="store.id"
                            :value="store.id"
                        >
                            {{ store.title }}
                        </option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <label for="category" class="form-label">التصنيف</label>
                        <select
                            class="form-select"
                            id="category"
                            v-model="form.cat"
                            @change="getSubCats"
                        >
                            <option
                                v-for="cat in cats"
                                :key="cat.id"
                                :value="cat.id"
                            >
                                {{ cat.title }}
                            </option>
                        </select>
                    </div>
                    <div class="col-lg">
                        <label for="subcategory" class="form-label">
                            التصنيف الفرعي
                        </label>
                        <select
                            class="form-select"
                            id="subcategory"
                            v-model="form.subcat"
                        >
                            <option
                                v-for="subcat in subCats"
                                :key="subcat.id"
                                :value="subcat.id"
                            >
                                {{ subcat.title }}
                            </option>
                        </select>
                    </div>
                </div>
                <br />
                <div class="d-grid gap-2 col-2 mx-auto">
                    <button type="submit" class="btn btn-primary">اضافة</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import Sidebar from "../components/Sidebar";
import axios from "axios";
export default {
    components: {
        Sidebar,
    },
    data() {
        return {
            stores: [],
            cats: [],
            subCats: [],
            form: {
                title: "",
                type: "",
                offer_link: "",
                coupon: "",
                store: null,
                cat: null,
                subcat: null,
            },
        };
    },
    mounted() {
        axios
            .get("/api/admin/stores")
            .then((res) => (this.stores = res.data))
            .catch((err) => console.log(err));
        axios
            .get("/api/admin/cats")
            .then((res) => (this.cats = res.data))
            .catch((err) => console.log(err));
    },
    methods: {
        getSubCats() {
            axios
                .post("/api/admin/subcats", { cat_id: this.form.cat })
                .then((res) => (this.subCats = res.data))
                .catch((err) => console.log(err));
        },
        addCoupon() {
            axios
                .post("/api/admin/add-coupon", this.form)
                .then((res) => {
                    alert("تم اضافة الكوبون بنجاح"), location.reload();
                })
                .catch((err) => console.log(err));
        },
    },
};
</script>
