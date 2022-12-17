<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Gender;
use App\Http\Requests\StoreEmployees;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::all();
        return view('employees.create',compact('genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployees $request)
    {
        try{

            $validated = $request->validated();

            $employee = new Employee();
            $employee->employee_name = $request->employee_name;
            $employee->mobile_number = $request->mobile_number;
            $employee->Address = $request->Address;
            $employee->email = $request->email;
            $employee->genders_id = $request->genders_id;
            $employee->password = Hash::make($request->password);

            $employee->save();

            toastr()->success('Employee has been saved successfully!');

            return redirect()->route('employees.index');
        }

        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $genders = Gender::all();
        return view('employees.edit',compact('employee','genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployees $request)
    {
        try{

            $validated = $request->validated();

            $employee = Employee::findOrFail($request->id);
            $employee->employee_name = $request->employee_name;
            $employee->mobile_number = $request->mobile_number;
            $employee->Address = $request->Address;
            $employee->email = $request->email;
            $employee->genders_id = $request->genders_id;
            $employee->password = Hash::make($request->password);

            $employee->save();


            toastr()->success('Employee has been updated successfully!');

            return redirect()->route('employees.index');
        }

        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $employee = Employee::findOrFail($request->id);
        $employee->delete();
        toastr()->error('Employee has been deleted successfully!','Delete');
        return redirect()->route('employees.index');
    }
}
