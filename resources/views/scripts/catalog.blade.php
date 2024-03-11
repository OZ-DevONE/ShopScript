@extends('app.nav')

@section('title', 'Каталог')

@section('head')
    {{-- Базовые мета-теги --}}
    <meta name="description" content="Каталог скриптов включает разнообразные программные продукты для автоматизации задач, улучшения работы сайтов и многое другое.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Каталог скриптов | ShopScript">
    <meta property="og:description" content="Просмотрите наш широкий ассортимент скриптов для различных нужд. Найдите идеальный скрипт для вашего проекта сегодня.">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('body')
<div class="container mt-5">
    <h2>Каталог</h2>

    <!-- Форма для фильтрации -->
    <form action="{{ route('scripts.index') }}" method="GET" class="mb-5">
        <div class="row">
            <div class="col">
                <select class="form-select" name="category">
                    <option value="">Выберите категорию</option>
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select class="form-select" name="price">
                    <option value="">Сортировать по цене</option>
                    <option value="low_to_high">От низкой к высокой</option>
                    <option value="high_to_low">От высокой к низкой</option>
                </select>
            </div>
            <div class="col">
                <select class="form-select" name="date">
                    <option value="">Сортировать по дате</option>
                    <option value="newest">Сначала новые</option>
                    <option value="oldest">Сначала старые</option>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Применить фильтр</button>
            </div>
        </div>
    </form>


    <div class="mt-3">
        @if ($scripts->count() > 0)
            <div class="row">
                @foreach ($scripts as $index => $scripts_item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="/storage/scripts/{{ $scripts_item->image }}" class="card-img-top" alt="{{ $scripts_item->image }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $scripts_item->title }}</h5>
                                <p class="card-text">{{ $scripts_item->description }}</p>
                                <h6 class="card-title">{{ $scripts_item->price }} ₽</h6>
                                <a href="{{ route('scripts.show', $scripts_item->id) }}" class="btn btn-primary">Подробнее</a>
                            </div>
                        </div>
                    </div>
                    @if (($index + 1) % 3 == 0)
                        </div><div class="row">
                    @endif
                @endforeach
            </div>
            <div class="mt-4">
                {{ $scripts->links() }}
            </div>
        @else
            <p>Товаров не найдено.</p>
        @endif
    </div>
</div>
@endsection
