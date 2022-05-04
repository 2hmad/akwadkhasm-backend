<template>
    <div id="dashboard-page">
        <Sidebar />
        <div class="container" style="margin-top: 3%">
            <a href="/add-store">
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
                <!-- <template slot="table-row" slot-scope="props">
                    <span v-if="props.column.field == 'actions'">
                        <a
                            class="btn btn-danger"
                            @click="deleteStore(props.rows.id)"
                        >
                            حذف
                        </a>
                    </span>
                    <span v-else>
                        {{ props.formattedRow[props.column.field] }}
                    </span>
                </template> -->
            </vue-good-table>
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
            columns: [
                {
                    label: "#",
                    field: "id",
                },
                {
                    label: "المتجر",
                    field: "title",
                },
                // {
                //     label: "",
                //     field: "actions",
                //     sortable: false,
                // },
            ],
            rows: [],
        };
    },
    mounted() {
        axios
            .get("/api/admin/stores")
            .then((res) => (this.rows = res.data))
            .catch((err) => console.log(err));
    },
    methods: {
        deleteStore(id) {
            axios
                .get("/api/admin/delete-store", {
                    id: id,
                })
                .then((res) => {
                    alert("تم حذف المتجر"), location.reload();
                })
                .catch((err) => console.log(err));
        },
    },
};
</script>
