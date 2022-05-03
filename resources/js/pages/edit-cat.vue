<template>
    <div id="dashboard-page">
        <Sidebar />
        <div class="container" style="margin-top: 3%">
            <form method="POST">
                <div class="mb-3">
                    <label for="store_ar" class="form-label"
                        >عنوان التصنيف (عربي)</label
                    >
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
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="store_ar" class="form-label"
                                        >عنوان التصنيف الفرعي (عربي)</label
                                    >
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
                                        >عنوان التصنيف الفرعي (انجليزي)</label
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
                <li class="list-group-item">
                    <span>An item</span>
                    <form method="POST">
                        <button class="btn btn-light">&times;</button>
                    </form>
                </li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
            </ul>
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
