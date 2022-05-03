<template>
    <div id="login-page">
        <form method="POST">
            <h3>تسجيل الدخول</h3>
            <label>البريد الالكتروني</label>
            <input
                type="email"
                name="email"
                class="email"
                placeholder="البريد الالكتروني"
                required
            />
            <label>كلمة المرور</label>
            <input
                type="password"
                name="password"
                class="password"
                placeholder="كلمة المرور"
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
export default {
    data() {},
};
</script>
