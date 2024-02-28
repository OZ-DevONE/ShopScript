@extends('app.nav')

@section('title', 'Редактирование скрипта')

@section('body')

    <div class="container mt-5">
        <h2>Редактировать скрипта</h2>

        <form action="{{ route('scripts.update', $scripts->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Название скрипта</label>
                <input type="text" class="form-control" name="title" id="title"
                    value="{{ old('title', $scripts->title ?? '') }}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $scripts->description ?? '') }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <div class="form-group">
                    @if (isset($scripts) && $scripts->image)
                        <img src="/storage/scripts/{{ $scripts->image }}" class="img-thumbnail" alt="{{ $scripts->image }}">
                        <label for="image" class="input-label">Изображение</label>
                        <input class="input-field" type="file" name="image" id="image">
                    @endif
                </div>
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="source_code" class="form-label">Исходный код</label>
                <input class="form-control" type="file" name="source_code" id="source_code">
                @if (isset($scripts) && $scripts->source_code_path)
                    <a href="/storage/{{ $scripts->source_code_path }}" download>Скачать текущий исходный код</a>
                @endif
                @error('source_code')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            

            <div class="mb-3">
                <label for="category" class="form-label">Категории</label>
                <select class="form-select" name="category" aria-label="Default select example">
                    @foreach ($categories as $categories_item)
                       <option value="{{$categories_item->id}}">{{$categories_item->title}}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-3">
                <label for="price" class="form-label">Цена</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ old('price', $scripts->price ?? '') }}">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-dark">Редактировать</button>

        </form>
    </div>

@endsection
