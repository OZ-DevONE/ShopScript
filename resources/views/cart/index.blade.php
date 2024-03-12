@extends('app.nav')

@section('title', 'Корзина')

{{-- SEO: Мета-теги для улучшения интеграции с социальными сетями --}}
@section('head')
    <meta name="description" content="Ваша корзина покупок на сайте ShopScript. Просмотрите выбранные товары и перейдите к оформлению заказа.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Корзина покупок | ShopScript">
    <meta property="og:description" content="Просмотр и управление вашей корзиной покупок на сайте ShopScript. Оформите заказ в несколько кликов.">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('body')
<div class="container mt-4">
    <h2>Корзина</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($cartItems->isEmpty())
        <p>Ваша корзина пуста.</p>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Название</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item->script->title }}</td>
                            <td>{{ $item->script->price }} ₽</td>
                            <td>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('cart.order') }}" class="btn btn-success">Купить</a>
            </div>
        </div>
    @endif
</div>
@endsection
