@extends('app.nav')

@section('title', 'Добавление категории')

{{-- SEO: Улучшение интеграции с социальными сетями и улучшение доступности --}}
@section('head')
    <meta name="description" content="Страница добавления новой категории в каталог товаров.">
    <meta property="og:title" content="Добавление категории | ВашМагазин">
    <meta property="og:description" content="Добавьте новую категорию в каталог вашего магазина для улучшения структуры и навигации.">
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
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark">Добавить</button>
        </form>
    </div>
@endsection
