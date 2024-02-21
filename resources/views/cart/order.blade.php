@extends('app.nav')

@section('title', 'Оформление заказа')

@section('body')
<div class="container">
    <h2>Оформление заказа</h2>
    <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cardNumber" class="form-label">Номер карты</label>
            <input type="text" class="form-control" id="cardNumber" name="card_number" required>
        </div>
        <div class="mb-3">
            <label for="expirationDate" class="form-label">Срок действия</label>
            <input type="text" class="form-control" id="expirationDate" name="expiration_date" required>
        </div>
        <div class="mb-3">
            <label for="cvv" class="form-label">CVV</label>
            <input type="text" class="form-control" id="cvv" name="cvv" required>
        </div>
        <button type="submit" class="btn btn-primary">Оформить покупку</button>
    </form>
</div>
@endsection
