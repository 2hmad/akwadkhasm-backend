<template>
    <div id="dashboard-page">
        <Sidebar />
        <div class="container" style="margin-top: 3%">
            <form @submit.prevent="addSlide">
                <div class="mb-3">
                    <label for="url" class="form-label">رابط العرض</label>
                    <input
                        type="url"
                        class="form-control"
                        id="url"
                        placeholder="https://www.noon.com/egypt-ar/eg-may22-eid-alfitr/"
                        v-model="form.url"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">الاعلان</label>
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
            <hr />
            <b-row style="justify-content: center">
                <b-col lg="6" v-for="slide in slides" :key="slide.id">
                    <b-card
                        :img-src="`http://admin.akwadkhasm.com/storage/carousels/${slide.pic}`"
                        img-alt="Image"
                        img-top
                    >
                        <b-button
                            variant="danger"
                            @click="deleteSlide(slide.id)"
                        >
                            حذف
                        </b-button>
                    </b-card>
                </b-col>
            </b-row>
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
            slides: [],
            form: {
                url: "",
                image: null,
            },
        };
    },
    mounted() {
        axios
            .get("/api/admin/slides")
            .then((res) => (this.slides = res.data))
            .catch((err) => console.log(err));
    },
    methods: {
        deleteSlide(id) {
            axios
                .post("/api/admin/delete-slide", {
                    id: id,
                })
                .then((res) => {
                    alert("تم حذف السلايدر بنجاح"), location.reload();
                })
                .catch((err) => console.log(err));
        },
        addSlide() {
            const data = new FormData();
            data.append("image", this.form.image, this.form.image.name);
            const details = JSON.stringify({
                url: this.form.url,
            });
            data.append("data", details);
            const config = {
                headers: {
                    "content-type": "multipart/form-data",
                },
            };
            axios
                .post("/api/admin/add-slide", data, config)
                .then((result) => {
                    alert("تم اضافة الاعلان بنجاح"), location.reload();
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
