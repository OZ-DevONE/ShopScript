@extends('app.nav')

@section('title', 'Профиль пользователя')

@section('body')
<div class="container my-4">
    <h1>Профиль пользователя</h1>
    <p>Добро пожаловать, {{ Auth::user()->name }}!</p>

    <h2 class="mt-4">Ваши покупки</h2>
    @if($purchases->isEmpty())
        <p>Вы еще не совершали покупок.</p>
    @else
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Дата покупки</th>
                        <th scope="col">Скачать</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $index => $purchase)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $purchase->script->title }}</td>
                            <td>{{ $purchase->created_at->format('d.m.Y H:i') }}</td>
                            <td>
                                @if($purchase->script->source_code_path)
                                    <a href="{{ asset('storage/' . $purchase->script->source_code_path) }}" class="btn btn-primary btn-sm" download>Скачать</a>
                                @else
                                    Файл не доступен
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
