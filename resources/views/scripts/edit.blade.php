@extends('app.nav')

@section('title', 'Редактирование скрипта')

@section('body')

    <div class="mt-5">
        <h2>Редактировать скрипта</h2>

        <form action="#" method="POST" enctype="multipart/form-data">
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
                <label for="image" class="form-label">Описание</label>
                <input name="image" type="file">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Категории</label>
                <select name="category" id="category">
                    <option value="1">1</option>
                </select>
                @error('category')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-dark">Отправить</button>

        </form>
    </div>

@endsection
