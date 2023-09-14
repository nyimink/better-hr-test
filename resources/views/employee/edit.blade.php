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
                <input type="text" class="form-control" name="name" value="{{ $employee->name }}">
            </div>
            <div class="mt-3">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value="{{ $employee->email }}">
            </div>
            <div class="mt-3">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}">
            </div>
            <div class="mt-3">
                <label for="">Address</label>
                <textarea name="address" class="form-control">{{ $employee->address }}</textarea>
            </div>
            <button type="submit" class="btn btn-outline-success mt-4 w-25">Update</button>
        </form>
    </div>
@endsection
