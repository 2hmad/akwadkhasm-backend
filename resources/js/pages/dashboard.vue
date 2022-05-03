<template>
    <div id="dashboard-page">
        <Sidebar />
        <div></div>
    </div>
</template>
<script>
import axios from "axios";
import Sidebar from "../components/Sidebar";
import auth from "../store/modules/auth";
export default {
    components: {
        Sidebar,
    },
    data() {
        return {};
    },
    mounted() {
        console.log(auth);
    },
};
</script>
