@extends('layouts.profile')

@section('profile')
    <div class="container" style="max-width: 780px;">
        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control mt-1" readonly disabled
                        value="{{ $employee->name }}">
                </div>
                <div class="mb-2">
                    <label for="">Email</label>
                    <input type="text" name="name" class="form-control mt-1" readonly disabled
                        value="{{ $employee->email }}">
                </div>
                <div class="mb-2">
                    <label for="">Phone</label>
                    <input type="text" name="name" class="form-control mt-1" readonly disabled
                        value="{{ $employee->phone }}">
                </div>
                <div class="mb-2">
                    <label for="">Address</label>
                    <input type="text" name="name" class="form-control mt-1" readonly disabled
                        value="{{ $employee->address }}">
                </div>
                <div class="mt-3">
                    <a href="{{ url("/employee/edit/$employee->id") }}" class="btn btn-outline-dark">Edit</a>
                    <a href="{{ url("/employee/delete/$employee->id") }}" class="btn btn-dark" onClick="return confirm('Are you sure to delete this empolyee?')">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection
