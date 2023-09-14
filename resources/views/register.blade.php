@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 600px">
        <h1 class=" text-center">Register Form</h1>

        @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                @endforeach
            </div>
        @endif

        <form action="{{ url('register') }}" method="post">
            @csrf
            <div class="mt-4">
                <label for="">Name</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="mt-4">
                <label for="">Email</label>
                <input class="form-control" type="email" name="email">
            </div>
            <div class="mt-4">
                <label for="">Password</label>
                <input class="form-control" type="password" name="password">
            </div>
            <button class="btn btn-primary w-100 mt-3" type="submit">Register</button>
            <a href="{{ url('/') }}" class="text-center mt-2" style="display: block">Already have an account?</a>
        </form>
    </div>
@endsection
