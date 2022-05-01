@extends('layouts.app')
@section('links')
@endsection
@section('body')
    <div id="dashboard-page">
        @include('layouts.sidebar')
        <div class="container" style="margin-top:3%">
            <form method="POST">
                <div class="mb-3">
                    <label for="store_ar" class="form-label">عنوان الكوبون (عربي)</label>
                    <input type="text" class="form-control" id="store_ar" placeholder="خصم 50% علي جميع المنتجات" required>
                </div>
                <div class="mb-3">
                    <label for="store_en" class="form-label">عنوان الكوبون (انجليزي)</label>
                    <input type="text" class="form-control" id="store_en" placeholder="50% Discount on all products"
                        required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">النوع</label>
                    <select class="form-select" id="type">
                        <option>كوبون</option>
                        <option>عرض</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="offer-link" class="form-label">رابط العرض</label>
                    <input type="text" class="form-control" id="offer-link" required>
                </div>
                <div class="mb-3">
                    <label for="store" class="form-label">المتجر</label>
                    <select class="form-select" id="store">
                        <option>نون</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <label for="store" class="form-label">التصنيف</label>
                        <select class="form-select" id="store">
                            <option>الكترونيات</option>
                        </select>
                    </div>
                    <div class="col-lg">
                        <label for="store" class="form-label">التصنيف الفرعي</label>
                        <select class="form-select" id="store">
                            <option>خلاط</option>
                        </select>
                    </div>
                </div>
                <div class="d-grid gap-2 col-2 mx-auto">
                    <button type="submit" class="btn btn-primary">اضافة</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
