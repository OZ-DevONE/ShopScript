{{-- Подключение основного шаблона --}}
@extends('app.nav')

{{-- Установка мета-тегов специфичных для страницы --}}
@section('head')
    <meta name="description" content="Регистрация нового пользователя на сайте ShopScript. Присоединяйтесь к нам для управления заказами и получения специальных предложений.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Регистрация нового пользователя | ShopScript">
    <meta property="og:description" content="Страница для регистрации нового пользователя на сайте ShopScript. Присоединяйтесь к нам сегодня.">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

{{-- Установка заголовка страницы --}}
@section('title', 'Регистрация нового пользователя')

{{-- Содержимое тела страницы --}}
@section('body')
<div class="container mt-5">
    <div class="card mx-auto col-md-6 p-4">
        <form method="POST" action="{{ route('register_post') }}">
            @csrf <!-- CSRF защита -->

            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email адрес</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
                @if ($errors->has('password'))
                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>
            
            <div class="mb-3">
                <label for="password-confirm" class="form-label">Повторно пароль</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                    <div class="alert alert-danger">{{ $errors->first('password_confirmation') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Регистрация</button>
        </form>
    </div>
</div>
@endsection
