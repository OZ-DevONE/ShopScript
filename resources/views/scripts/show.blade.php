@extends('app.nav')

@section('title', 'Страница скрипта')

@section('body')

    @foreach ($scripts as $scripts_item)
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Изображение скрипта">
                        <div class="card-body">
                            <h5 class="card-title">{{$scripts_item->title}}</h5>
                            <p class="card-text">{{$scripts_item->description}}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$scripts_item->price}} ₽</li>
                                <li class="list-group-item">{{$scripts_item->category->title}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
