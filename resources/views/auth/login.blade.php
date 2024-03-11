{{-- Подключение основного шаблона --}}
@extends('app.nav')

{{-- Установка мета-тегов специфичных для страницы --}}
@section('head')
    <meta name="description" content="Вход в личный кабинет на сайте ShopScript. Управляйте своими заказами и настройками аккаунта.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Вход в личный кабинет | ShopScript">
    <meta property="og:description" content="Страница для входа в личный кабинет на сайте ShopScript.">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

{{-- Установка заголовка страницы --}}
@section('title', 'Вход в личный кабинет')

{{-- Содержимое тела страницы --}}
@section('body')
<div class="container mt-5">
    <div class="card mx-auto col-md-6 p-4">
        <form method="POST" action="{{ route('login_post') }}">
            @csrf {{-- CSRF защита --}}
        
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email адрес</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>
        
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                @if ($errors->has('password'))
                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>
        
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
        <div class="mt-3">
            <p>Нету аккаунта, вы неформал? Быстрее леши себя этой учести: <a href="{{ route('register') }}">Регистрация</a></p>
        </div>
    </div>
</div>
@endsection
