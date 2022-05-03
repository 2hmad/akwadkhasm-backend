<template>
    <div id="dashboard-page">
        <Sidebar />
        <div class="container" style="margin-top: 3%">
            <form @submit.prevent="addStore">
                <div class="mb-3">
                    <label for="store_ar" class="form-label">اسم المتجر</label>
                    <input
                        type="text"
                        class="form-control"
                        id="store_ar"
                        placeholder="نون"
                        v-model="form.title"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">
                        رابط الموقع الخاصة بالمتجر
                    </label>
                    <input
                        type="url"
                        class="form-control"
                        id="website"
                        placeholder="https://noon.com"
                        v-model="form.url"
                    />
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">شعار المتجر</label>
                    <b-form-file
                        placeholder="Choose a file or drop it here..."
                        drop-placeholder="Drop file here..."
                        id="formFile"
                        accept=".jpg, .png, .jpeg, .svg"
                        v-model="form.image"
                    ></b-form-file>
                </div>
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
        return {
            form: {
                title: "",
                url: "",
                image: null,
            },
        };
    },
    methods: {
        addStore() {
            const data = new FormData();
            data.append("image", this.form.image, this.form.image.name);
            const details = JSON.stringify({
                title: this.form.title,
                url: this.form.url,
            });
            data.append("data", details);
            const config = {
                headers: {
                    "content-type": "multipart/form-data",
                },
            };
            axios
                .post("/api/admin/add-store", data, config)
                .then((result) => {
                    alert("تم اضافة المتجر بنجاح"), location.reload();
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
