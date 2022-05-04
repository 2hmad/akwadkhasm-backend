<template>
    <div id="dashboard-page">
        <Sidebar />
        <div class="container" style="margin-top: 3%">
            <h5 style="text-align: center; margin: 3% auto">
                تغيير كلمة المرور
            </h5>
            <form @submit.prevent="changePassword">
                <div class="mb-3">
                    <label for="oldPassword" class="form-label">
                        كلمة المرور القديمة
                    </label>
                    <input
                        type="password"
                        class="form-control"
                        id="oldPassword"
                        v-model="password.oldPassword"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">
                        كلمة المرور الجديدة
                    </label>
                    <input
                        type="password"
                        class="form-control"
                        id="newPassword"
                        v-model="password.newPassword"
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
            user: JSON.parse(localStorage.getItem("akwadKhasmAdmin")),
            password: {
                oldPassword: "",
                newPassword: "",
            },
        };
    },
    methods: {
        changePassword() {
            axios
                .post("/api/admin/change-password", this.password, {
                    headers: {
                        token: this.user.token,
                    },
                })
                .then((res) => {
                    alert("تم تغيير كلمة المرور");
                    location.reload();
                })
                .catch((err) => alert(err.response.data));
        },
    },
};
</script>
