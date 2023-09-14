<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', [
            'employees' => $employees
        ]);
    }

    public function detail($id)
    {
        $employee = Employee::find($id);
        return view('employee.detail',[
            "employee" => $employee
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

        return redirect('/employees')->with('success',"An employee is created successfully.");
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit',[
            "employee" => $employee
        ]);
    }

    public function update($id, Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
            'email' => 'required | unique:employees,email,'.$id,
            'phone' => 'required',
            'address' => 'required',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->save();

        return redirect('/employees')->with('updated', "An employee is updated successfully.");
    }

    public function delete($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/employees')->with('delete', "An employee is deleted.");
    }
}
