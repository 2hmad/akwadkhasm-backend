@extends('layouts.app')
@section('links')
    <link href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
@endsection
@section('body')
    <div id="dashboard-page">
        @include('layouts.sidebar')
        <div class="container" style="margin-top:3%">
            <a href="/add-store">
                <button class="btn btn-outline-success">
                    اضافة +
                </button>
            </a>
            <div id="wrapper" style="direction: ltr;"></div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script>
    <script>
        function editFormatter(cell, row) {
            var delete_button = gridjs.h(
                "button", {
                    className: "btn btn-danger",
                    name: "delete-coupon",
                },
                "حذف"
            );

            return (
                gridjs.h('form', {
                    method: "POST",
                    action: "/delete-coupon/" + row.cells[0].data
                }, delete_button)
            )
        }

        new gridjs.Grid({
            columns: [{
                name: '#'
            }, {
                name: "المتجر"
            }, {
                name: '',
                formatter: editFormatter,
            }],
            server: {
                url: 'http://localhost:8000/api/allcoupons',
                then: data => data.map(coupon => [coupon.id, coupon.title_ar, coupon.type, coupon.store.title_ar])
            },
            search: {
                enabled: true,
                placeholder: 'ابحث'
            },
            pagination: {
                enabled: true,
                limit: 20,
                summary: false
            },
            language: {
                'search': {
                    'placeholder': '🔍 ابحث...'
                },
                'pagination': {
                    'previous': 'السابق',
                    'next': 'التالي',
                    'showing': 'يظهر',
                    'results': () => 'نتيجة بحث'
                },
            }
        }).render(document.getElementById("wrapper"));
    </script>
@endsection
