<template>
    <div id="dashboard-page">
        <Sidebar />
        <div class="container" style="margin-top: 3%">
            <form @submit.prevent="editCat">
                <div class="mb-3">
                    <label for="store_ar" class="form-label">
                        عنوان التصنيف
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="store_ar"
                        placeholder="نون"
                        v-model="update.title"
                        required
                    />
                </div>
                <div class="d-grid gap-2 col-2 mx-auto">
                    <button type="submit" class="btn btn-primary">تعديل</button>
                </div>
            </form>
            <hr class="divider" />
            <div
                style="
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    margin: 3% auto;
                "
            >
                <h4>التصنيفات الفرعية</h4>
                <button
                    type="button"
                    class="btn btn-outline-success"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"
                >
                    اضافة +
                </button>
            </div>
            <!-- Modal -->
            <div
                class="modal fade"
                id="exampleModal"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                اضافة تصنيف فرعي
                            </h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="addSubCat">
                                <div class="mb-3">
                                    <label for="store_ar" class="form-label">
                                        عنوان التصنيف الفرعي
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="store_ar"
                                        placeholder="نون"
                                        v-model="subCat.title"
                                        required
                                    />
                                </div>
                                <div class="d-grid gap-2 col-2 mx-auto">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        اضافة
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="list-group">
                <li
                    class="list-group-item"
                    v-for="subCat in cat.subcategory"
                    :key="subCat.id"
                >
                    <span>{{ subCat.title }}</span>
                    <button
                        class="btn btn-light"
                        @click="deleteSubCat(subCat.id)"
                    >
                        &times;
                    </button>
                </li>
            </ul>
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
            cat: null,
            update: {
                title: "",
            },
            subCat: {
                title: "",
            },
        };
    },
    mounted() {
        axios
            .get(`/api/admin/one-cat/${this.$route.params.id}`)
            .then((res) => {
                (this.cat = res.data), (this.update.title = res.data.title);
            })
            .catch((err) => console.log(err));
    },
    methods: {
        addSubCat() {
            axios
                .post("/api/admin/add-subcat/", {
                    title: this.subCat.title,
                    cat_id: this.$route.params.id,
                })
                .then((res) => {
                    alert("تم اضافة التصنيف الفرعي"), location.reload();
                })
                .catch((err) => console.log(err));
        },
        editCat() {
            axios
                .post("/api/admin/edit-cat", {
                    id: this.$route.params.id,
                    title: this.update.title,
                })
                .then((res) => {
                    alert("تم تعديل التصنيف"), location.reload();
                })
                .catch((err) => console.log(err));
        },
        deleteSubCat(id) {
            axios
                .post("/api/admin/delete-subcat", {
                    id: id,
                })
                .then((res) => {
                    alert("تم حذف التصنيف الفرعي"), location.reload();
                })
                .catch((err) => console.log(err));
        },
    },
};
</script>
<style scoped>
.list-group-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
</style>
