<template>
    <div id="dashboard-page">
        <Sidebar />
        <div class="container" style="margin-top: 3%">
            <a href="/add-cat">
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
                        <router-link
                            to="/edit-category"
                            class="btn btn-primary"
                        >
                            تعديل
                        </router-link>
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
                    field: "age",
                },
                {
                    label: "",
                    field: "actions",
                    sortable: false,
                },
            ],
            rows: [
                { id: 1, name: "John", age: 20, createdAt: "", score: 0.03343 },
                {
                    id: 2,
                    name: "Jane",
                    age: 24,
                    createdAt: "2011-10-31",
                    score: 0.03343,
                },
            ],
        };
    },
};
</script>
