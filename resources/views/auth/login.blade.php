@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px">
    <h1 class=" text-center">Login Form</h1>

    @if (session('auth-fail'))
        <div class="alert alert-warning">
            {{ session('auth-fail') }}
        </div>
    @endif

    <form action="{{ url('login') }}" method="post">
        @csrf
        <div class="mt-4">
            <label for="">Email</label>
            <input class="form-control" type="email" name="email">
        </div>
        <div class="mt-4">
            <label for="">Password</label>
            <input class="form-control" type="password" name="password">
        </div>
        <button class="btn btn-primary w-100 mt-3" type="submit">Login</button>
        <a href="{{ url('/register') }}" class="text-center mt-2" style="display: block">Register?</a>
    </form>
</div>
@endsection
