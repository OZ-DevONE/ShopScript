@extends('app.nav')

@section('title', 'Добавление категории')

{{-- SEO: Мета-теги для улучшения интеграции с социальными сетями --}}
@section('head')
    <meta name="description" content="Страница для добавления новой категории товаров на сайте ShopScript. Управляйте категориями легко и удобно.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Добавление категории | ShopScript">
    <meta property="og:description" content="Добавление новой категории товаров на сайте ShopScript. Упростите навигацию и улучшите структуру вашего интернет-магазина.">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('body')
    <div class="container mt-5">
        <h2>Добавление категории</h2>

        <form action="{{route('categories.store')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Название категории</label>
                <input type="text" class="form-control" name="title" id="title">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-dark">Добавить</button>
        </form>
    </div>
@endsection
