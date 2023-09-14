@extends('layouts.profile')

@section('profile')
    <div class="container">
        <a href="{{ url('employees/add') }}" class="btn btn-success float-end">add Employee</a>
        <h1>Employees List</h1>
        <table class="table table-bordered table-striped mt-4">
            <tr class="text-center">
                <td>Id</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Address</td>
                <td></td>
            </tr>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td class="text-truncate" style="max-width: 220px;">
                        {{ $employee->email }}
                    </td>
                    <td>{{ $employee->phone }}</td>
                    <td class="text-truncate" style="max-width: 250px;">
                        {{ $employee->address }}
                    </td>
                    <td>
                        <a class="btn btn-sm btn-outline-dark" href="{{ url("employee/edit/$employee->id") }}">Edit</a>
                        <a class="btn btn-sm btn-dark" href="{{ url("employee/delete/$employee->id") }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
