<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', [
            'employees' => $employees
        ]);
    }

    public function add()
    {
        return view('employee.add');
    }

    public function create(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
            'email' => 'required | unique:employees',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;

        $employee->save();

        return redirect('/employees')->with('success','An employee is created successfully');
    }


}
