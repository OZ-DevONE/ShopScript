@extends('app.nav')

@section('title', 'Каталог')

@section('body')


    @foreach ($scripts as $scripts_item)
        <div class="card" style="width: 18rem;">
            <img src="/storage/scripts/{{$scripts_item->image}}" class="card-img-top" alt="{{$scripts_item->image}}">
            <div class="card-body">
                <h5 class="card-title">{{$scripts_item->title}}</h5>
                <p class="card-text"> {{$scripts_item->description}} </p>
                <h6 class="card-title"> {{$scripts_item->price}} ₽ </h6>
                <a href="#" class="btn btn-primary">Подробнее</a>
            </div>
        </div>
    @endforeach

@endsection
