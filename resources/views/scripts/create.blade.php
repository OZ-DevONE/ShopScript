@extends('app.nav')

@section('title', 'Добавление скрипта')

@section('body')

    <div class="container mt-5">
        <h2>Добавление скрипта</h2>

        <form action="{{route('scripts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Название скрипта</label>
                <input type="text" class="form-control" name="title" id="title">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <input type="file" class="form-control" name="image" id="image">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Категории</label>
                <select class="form-select" name="category" aria-label="Default select example">
                    @foreach ($categories as $categories_item)
                        <option value="{{ $categories_item->id }}">{{ $categories_item->title }}</option>
                    @endforeach
                </select>

                @error('category')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Цена</label>
                <input type="number" class="form-control" name="price" id="price">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="source_code" class="form-label">Исходный код / Архив</label>
                <input type="file" class="form-control" name="source_code" id="source_code">
                @error('source_code')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            

            <button type="submit" class="btn btn-dark">Добавить</button>

        </form>
    </div>

@endsection
