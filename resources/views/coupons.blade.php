@extends('layouts.app')
@section('links')
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
@endsection
@section('body')
    <div id="dashboard-page">
        @include('layouts.sidebar')
        <div class="container">
            <div id="wrapper"></div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
    <script>
        new gridjs.Grid({
            columns: ["العنوان", "النوع", "المتجر"],
            server: {
                url: 'http://admin.akwadkhasm.com/api/allcoupons',
                then: data => data.map(coupon => [coupon.title_ar, coupon.type, coupon.store.title_en])
            },
            search: {
                enabled: true,
                placeholder: 'ابحث'
            },
            pagination: {
                enabled: true,
                limit: 2,
                summary: false
            },
            language: {
                'search': {
                    'placeholder': '🔍 ابحث...'
                },
                'pagination': {
                    'previous': 'السابق',
                    'next': 'القادم',
                    'showing': 'يظهر',
                    'results': () => 'نتيجة بحث'
                }
            }
        }).render(document.getElementById("wrapper"));
    </script>
@endsection
