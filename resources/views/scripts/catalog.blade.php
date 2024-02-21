@extends('app.nav')

@section('title', 'Каталог')

@section('body')

    <div class="container">

        <h2 class="mt-5">
            Каталог
        </h2>

        <div class="mt-3">

            @if ($scripts->count() > 0)
                @foreach ($scripts as $scripts_item)
                    <div class="card" style="width: 18rem;">
                        <img src="/storage/scripts/{{ $scripts_item->image }}" class="card-img-top"
                            alt="{{ $scripts_item->image }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $scripts_item->title }}</h5>
                            <p class="card-text"> {{ $scripts_item->description }} </p>
                            <h6 class="card-title"> {{ $scripts_item->price }} ₽ </h6>
                            <a href="#" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                @endforeach

                <div class="mt-4">
                    {{ $scripts->links() }}
                </div>
            @else
                <p>Товаров не найдено.</p>
            @endif

        </div>

    </div>

@endsection
