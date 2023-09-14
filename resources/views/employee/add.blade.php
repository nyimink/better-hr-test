@extends('layouts.profile')

@section('profile')
    <div class="container" style="max-width: 780px;">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{ $err }}
                @endforeach
            </div>
        @endif
        <form method="post">
            @csrf
            <div class="mt-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mt-3">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="mt-3">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="mt-3">
                <label for="">Address</label>
                <textarea name="address" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success mt-4 w-25">Add</button>
        </form>
    </div>
@endsection
