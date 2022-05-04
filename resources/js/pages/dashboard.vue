<template>
    <div id="dashboard-page">
        <Sidebar />
        <div class="container" style="margin-top: 3%">
            <b-row style="justify-content: center">
                <b-col lg="3">
                    <b-card :title="`${coupons.length}`">
                        <b-card-text> كوبون </b-card-text>
                    </b-card>
                </b-col>
                <b-col lg="3">
                    <b-card :title="`${stores.length}`">
                        <b-card-text> متاجر </b-card-text>
                    </b-card>
                </b-col>
                <b-col lg="3">
                    <b-card :title="`${cats.length}`">
                        <b-card-text> تصنيفات </b-card-text>
                    </b-card>
                </b-col>
            </b-row>
            <div style="margin-top: 3%">
                <h4 style="text-align: center">اخر اضافات</h4>
                <vue-good-table
                    :columns="columns"
                    :rows="stores"
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
                            <a
                                class="btn btn-outline-success"
                                :href="`https://akwadkhasm.com/stores/${props.row.id}`"
                                target="_blank"
                            >
                                عرض
                            </a>
                        </span>
                        <span v-else>
                            {{ props.formattedRow[props.column.field] }}
                        </span>
                    </template>
                </vue-good-table>
            </div>
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
                {
                    label: "",
                    field: "actions",
                    sortable: false,
                },
            ],
            coupons: [],
            stores: [],
            cats: [],
        };
    },
    mounted() {
        axios
            .get("/api/admin/coupons")
            .then((res) => (this.coupons = res.data))
            .catch((err) => console.log(err));
        axios
            .get("/api/admin/stores")
            .then((res) => (this.stores = res.data))
            .catch((err) => console.log(err));
        axios
            .get("/api/admin/cats")
            .then((res) => (this.cats = res.data))
            .catch((err) => console.log(err));
    },
};
</script>
