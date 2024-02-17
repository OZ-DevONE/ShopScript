@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Профиль пользователя</h1>
    <p>Добро пожаловать, {{ Auth::user()->name }}!</p>
</div>
@endsection
