<template>
    <div id="login-page">
        <form @submit.prevent="login">
            <h3>تسجيل الدخول</h3>
            <label>البريد الالكتروني</label>
            <input
                type="email"
                name="email"
                class="email"
                placeholder="البريد الالكتروني"
                v-model="form.email"
                required
            />
            <label>كلمة المرور</label>
            <input
                type="password"
                name="password"
                class="password"
                placeholder="كلمة المرور"
                v-model="form.password"
                required
            />
            <div>
                <input type="checkbox" name="remember" id="remember" />
                <label for="remember">تذكرني</label>
            </div>
            <input
                type="submit"
                name="login"
                class="btn btn-outline-primary"
                value="تسجيل الدخول"
            />
        </form>
    </div>
</template>
<script>
import { mapActions } from "vuex";
import store from "../store";
export default {
    data() {
        return {
            form: {
                email: "",
                password: "",
            },
        };
    },
    mounted() {
        console.log(store.state);
    },
    methods: {
        ...mapActions(["LogIn"]),
        async login() {
            const User = new FormData();
            User.append("email", this.form.email);
            User.append("password", this.form.password);
            try {
                await this.LogIn(User);
                window.location.href = "/";
            } catch (error) {
                console.log(error);
            }
        },
    },
};
</script>
