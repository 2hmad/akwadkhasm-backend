<template>
    <nav
        class="navbar navbar-expand-lg navbar-dark bg-dark"
        style="background: #1475bc !important"
    >
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img
                    src="https://akwadkhasm.com/CODE.svg"
                    style="width: 150px; max-width: 150px"
                />
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/" style="color: white">
                            الرئيسية
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="/coupons"
                            style="color: white"
                        >
                            الكوبونات
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/stores" style="color: white"
                            >المتاجر</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="/categories"
                            style="color: white"
                            >التصنيفات</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="/add-slide"
                            style="color: white"
                            >الاعلانات</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="/account"
                            style="color: white"
                        >
                            حسابي
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href=""
                            style="color: white"
                            @click="logout"
                            >تسجيل خروج</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script>
export default {
    name: "Sidebar",
    methods: {
        async logout() {
            await this.$store.dispatch("LogOut");
            this.$router.push("/login");
        },
    },
};
</script>
