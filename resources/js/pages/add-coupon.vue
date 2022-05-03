<template>
    <div id="dashboard-page">
        <Sidebar />
        <div class="container" style="margin-top: 3%">
            <form method="POST">
                <div class="mb-3">
                    <label for="store_ar" class="form-label"
                        >عنوان الكوبون (عربي)</label
                    >
                    <input
                        type="text"
                        class="form-control"
                        id="store_ar"
                        placeholder="خصم 50% علي جميع المنتجات"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="store_en" class="form-label"
                        >عنوان الكوبون (انجليزي)</label
                    >
                    <input
                        type="text"
                        class="form-control"
                        id="store_en"
                        placeholder="50% Discount on all products"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">النوع</label>
                    <select class="form-select" id="type">
                        <option>كوبون</option>
                        <option>عرض</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="offer-link" class="form-label"
                        >رابط العرض</label
                    >
                    <input
                        type="text"
                        class="form-control"
                        id="offer-link"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="store" class="form-label">المتجر</label>
                    <select class="form-select" id="store">
                        <option>noon</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <label for="category" class="form-label">التصنيف</label>
                        <select class="form-select" id="category">
                            <option>cat</option>
                        </select>
                    </div>
                    <div class="col-lg">
                        <label for="subcategory" class="form-label"
                            >التصنيف الفرعي</label
                        >
                        <select class="form-select" id="subcategory">
                            <option>خلاط</option>
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
export default {
    components: {
        Sidebar,
    },
    data() {
        return {};
    },
};
</script>
