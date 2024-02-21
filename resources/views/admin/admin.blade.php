@extends('app.nav')

@section('title', 'Админка')

@section('body')

    <div class="container">

        <h2 class="mt-5">Скрипты</h2>

        <div class="mt-5">

            <a href="{{ route('scripts.create') }}">
                <button type="button" class="btn btn-success">
                    Добавить скрипт
                </button>
            </a>

            <a href="{{ route('categories.create') }}">
                <button type="button" class="btn btn-info">
                    Добавить категорию
                </button>
            </a>

        </div>

        @foreach ($scripts as $scripts_item)
            <div class="card mt-5" style="width: 18rem;">
                <img src="/storage/scripts/{{ $scripts_item->image }}" class="card-img-top"
                    alt="{{ $scripts_item->image }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $scripts_item->title }}</h5>
                    <p class="card-text"> {{ $scripts_item->description }} </p>
                    <h6 class="card-title"> {{ $scripts_item->price }} ₽ </h6>
                    <a href="#" class="btn btn-primary">Подробнее</a>

                    <a href="{{ route('scripts.edit', $scripts_item->id) }}" class="btn btn-success">Редактировать</a>

                    <form action="{{ route('scripts.destroy', $scripts_item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Удалить</button>

                    </form>
                </div>
            </div>
        @endforeach

        <h2 class="mt-5">Категории</h2>

        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $categories_item)
                    <tr>
                        <th scope="row">{{ $categories_item->id }}</th>
                        <td colspan="2">{{ $categories_item->title }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $categories_item->id) }}"
                                class="btn btn-success">Редактировать
                            </a>

                            <form action="{{ route('categories.destroy', $categories_item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Удалить</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection
