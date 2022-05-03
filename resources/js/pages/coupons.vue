<template>
    <div id="dashboard-page">
        <Sidebar />
        <div class="container" style="margin-top: 3%">
            <a href="/add-coupon">
                <button class="btn btn-outline-success">اضافة +</button>
            </a>
            <vue-good-table
                :columns="columns"
                :rows="rows"
                :search-options="{
                    enabled: true,
                }"
                :pagination-options="{
                    enabled: true,
                    perPage: 5,
                    firstLabel: 'الصفحة الاولي',
                    lastLabel: 'الصفحة الاخيرة',
                    nextLabel: 'التالي',
                    prevLabel: 'السابق',
                }"
                style="direction: ltr; margin-top: 3%"
            >
                <template slot="table-row" slot-scope="props">
                    <span v-if="props.column.field == 'actions'">
                        <button
                            class="btn btn-danger"
                            @click="deleteCoupon(props.row.id)"
                        >
                            حذف
                        </button>
                    </span>
                    <span v-else>
                        {{ props.formattedRow[props.column.field] }}
                    </span>
                </template>
            </vue-good-table>
        </div>
    </div>
</template>
<script>
import Sidebar from "../components/Sidebar";
import axios from "axios";
export default {
    components: {
        Sidebar,
    },
    data() {
        return {
            columns: [
                {
                    label: "#",
                    field: "id",
                },
                {
                    label: "العنوان",
                    field: "title",
                },
                {
                    label: "النوع",
                    field: "type",
                },
                {
                    label: "المتجر",
                    field: "store.title",
                },
                {
                    label: "",
                    field: "actions",
                    sortable: false,
                },
            ],
            rows: [],
        };
    },
    mounted() {
        axios
            .get("/api/admin/coupons")
            .then((res) => (this.rows = res.data))
            .catch((err) => console.log(err));
    },
    methods: {
        deleteCoupon(id) {
            axios
                .post("/api/admin/delete-coupon", {
                    id: id,
                })
                .then((res) => {
                    alert("تم حذف الكوبون بنجاح"), location.reload();
                })
                .catch((err) => console.log(err));
        },
    },
};
</script>
