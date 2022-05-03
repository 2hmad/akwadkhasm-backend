<template>
    <div id="dashboard-page">
        <Sidebar />
        <div class="container" style="margin-top: 3%">
            <form @submit.prevent="addCategory">
                <div class="mb-3">
                    <label for="store_ar" class="form-label">
                        عنوان التصنيف
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="store_ar"
                        placeholder="نون"
                        v-model="title"
                        required
                    />
                </div>
                <div class="d-grid gap-2 col-2 mx-auto">
                    <button type="submit" class="btn btn-primary">اضافة</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import Sidebar from "../components/Sidebar";
export default {
    components: {
        Sidebar,
    },
    data() {
        return {
            title: "",
        };
    },
    methods: {
        addCategory() {
            axios
                .post("/api/admin/add-cat", { title: this.title })
                .then((res) => {
                    alert("تم اضافة التصنيف بنجاح"), location.reload();
                })
                .catch((err) => console.log(err));
        },
    },
};
</script>
