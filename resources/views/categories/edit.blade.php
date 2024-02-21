@extends('app.nav')

@section('title', 'Редактирование категории')

@section('body')

    <div class="container mt-5">
        <h2>Редактирование категории</h2>

        <form action="{{route('categories.update', $categories->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Название категории</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $categories->title ?? '') }}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-dark">Редактировать</button>

        </form>
    </div>

@endsection

