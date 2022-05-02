@extends('layouts.app')
@section('body')
    <div id="login-page">
        <form method="POST" action="{{ route('customLogin') }}">
            <h3>تسجيل الدخول</h3>
            @csrf
            <label>البريد الالكتروني</label>
            <input type="email" name="email" class="email" placeholder="البريد الالكتروني" required>
            @if (Session::has('fail-email'))
                <span class="text-danger">البريد الالكتروني غير صحيح</span>
            @endif
            <label>كلمة المرور</label>
            <input type="password" name="password" class="password" placeholder="كلمة المرور" required>
            @if (Session::has('fail-password'))
                <span class="text-danger">كلمة المرور غير صحيحة</span>
            @endif
            <div>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">تذكرني</label>
            </div>
            <input type="submit" name="login" class="btn btn-outline-primary" value="تسجيل الدخول">
        </form>
    </div>
@endsection
