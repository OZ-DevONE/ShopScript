@extends('app.nav')

@section('title', "Страница скрипта - {$script->title}")

{{-- Добавление мета-тегов для SEO оптимизации --}}
@section('head')
<meta name="description" content="{{ Str::limit($script->description, 150, '...') }}">
<meta property="og:type" content="product">
<meta property="og:title" content="Страница скрипта - {{ $script->title }}">
<meta property="og:description" content="{{ Str::limit($script->description, 150, '...') }}">
<meta property="og:image" content="{{ asset('storage/scripts/' . $script->image) }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta name="twitter:card" content="summary_large_image">
@endsection

@section('body')
<div class="container my-5">
    <!-- Блок для вывода сообщений -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/scripts/' . $script->image) }}" alt="{{ $script->title }}" class="img-fluid rounded mb-4">
        </div>
        <div class="col-md-6">
            <h1 class="mb-3">{{ $script->title }}</h1>
            <p class="mb-2 text-muted">{{ $script->description }}</p>
            <h3 class="mb-4">{{ $script->price }} ₽</h3>
            @if($fileExtension)
            <p class="badge bg-secondary">Формат файла: .{{ $fileExtension }}</p>
            @else
            <p class="badge bg-warning text-dark">Формат файла не указан</p>
            @endif

            @auth
            <form action="{{ route('cart.add', $script->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Добавить в корзину</button>
            </form>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary">Войдите, чтобы добавить в корзину</a>
            @endauth
        </div>
    </div>
</div>
@endsection
