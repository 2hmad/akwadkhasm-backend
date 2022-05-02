@extends('layouts.app')
@section('links')
    <link href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
@endsection
@section('body')
    <div id="dashboard-page">
        @include('layouts.sidebar')
        <div class="container" style="margin-top:3%">
            <a href="/add-cat">
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
            var edit_button = gridjs.h(
                "button", {
                    className: "btn btn-primary",
                    name: "edit-cat",
                },
                "تعديل"
            );

            return (
                gridjs.h('form', {
                    method: "get",
                    action: "/edit-cat/" + row.cells[0].data
                }, edit_button)
            )
        }

        new gridjs.Grid({
            columns: [{
                name: '#'
            }, {
                name: "العنوان"
            }, {
                name: '',
                formatter: editFormatter,
            }],
            server: {
                url: 'http://localhost:8000/api/categories',
                then: data => data.map(cat => [cat.id, cat.title_ar, ])
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
