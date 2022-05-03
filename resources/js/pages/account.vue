<template>
    <div id="dashboard-page">
        <Sidebar />
        <div class="container" style="margin-top: 3%">
            <form @submit.prevent="addCategory">
                <div class="mb-3">
                    <label for="fullname" class="form-label">
                        الاسم بالكامل
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="fullname"
                        v-model="name"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">
                        البريد الالكتروني
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="email"
                        v-model="email"
                        required
                    />
                </div>
                <div class="d-grid gap-2 col-2 mx-auto">
                    <button type="submit" class="btn btn-primary">
                        حفظ التغييرات
                    </button>
                </div>
            </form>
            <hr />
            <h5 style="text-align: center; margin: 3% auto">
                تغيير كلمة المرور
            </h5>
            <form @submit.prevent="addCategory">
                <div class="mb-3">
                    <label for="oldPassword" class="form-label">
                        كلمة المرور القديمة
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="oldPassword"
                        v-model="changePassword.oldPassword"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">
                        كلمة المرور الجديدة
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="newPassword"
                        v-model="changePassword.newPassword"
                        required
                    />
                </div>
                <div class="d-grid gap-2 col-2 mx-auto">
                    <button type="submit" class="btn btn-primary">
                        تغيير كلمة المرور
                    </button>
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
            name: "",
            email: "",
            changePassword: {
                oldPassword: "",
                newPassword: "",
            },
        };
    },
    mounted() {},
    methods: {
        changePassword() {},
    },
};
</script>
