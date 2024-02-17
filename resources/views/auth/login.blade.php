@extends('app.nav')

@section('body')
<div class="container mt-5">
    <div class="card mx-auto col-md-6 p-4">
        <form method="POST" action="{{ route('login') }}">
            @csrf <!-- CSRF защита -->
        
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>
        
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                @if ($errors->has('password'))
                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>
        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="mt-3">
            <p>Нету аккаунта, вы неформал? Быстрее леши себя этой учести: <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
</div>
@endsection
