@extends('layouts.app')
@section('links')
@endsection
@section('body')
    <div id="dashboard-page">
        @include('layouts.sidebar')
        <div class="container" style="margin-top:3%">
            <form method="POST">
                <div class="mb-3">
                    <label for="store_ar" class="form-label">اسم المتجر (عربي)</label>
                    <input type="text" class="form-control" id="store_ar" placeholder="نون" required>
                </div>
                <div class="mb-3">
                    <label for="store_en" class="form-label">اسم المتجر (انجليزي)</label>
                    <input type="text" class="form-control" id="store_en" placeholder="noon" required>
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">رابط الموقع الخاصة بالمتجر</label>
                    <input type="url" class="form-control" id="website" placeholder="https://noon.com">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">شعار المتجر</label>
                    <input class="form-control" type="file" id="formFile" accept=".jpg,.png,.jpeg,.svg">
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
