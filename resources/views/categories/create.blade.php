@extends('app.nav')

@section('title', 'Добавление категории')

@section('body')

    <div class="container mt-5">
        <h2>Добавление категории</h2>

        <form action="#" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Название категории</label>
                <input type="text" class="form-control" name="title" id="title">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-dark">Добавить</button>

        </form>
    </div>

@endsection

