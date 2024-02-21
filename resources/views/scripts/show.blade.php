@extends('app.nav')

@section('title', "Страница скрипта - {$script->title}")

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
