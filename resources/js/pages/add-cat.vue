<template>
    <div id="dashboard-page">
        <Sidebar />
        <div class="container" style="margin-top: 3%">
            <form method="POST">
                <div class="mb-3">
                    <label for="store_ar" class="form-label">
                        عنوان التصنيف (عربي)
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="store_ar"
                        placeholder="نون"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="store_en" class="form-label"
                        >عنوان التصنيف (انجليزي)</label
                    >
                    <input
                        type="text"
                        class="form-control"
                        id="store_en"
                        placeholder="noon"
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
