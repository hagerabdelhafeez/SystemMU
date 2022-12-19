<?php

namespace App\Http\Controllers\Departments;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\College;
use App\Models\Clas;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDepartments;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $colleges = College::all();
        $classes = Clas::all();
        return view('departments.departments', compact('departments', 'colleges','classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartments $request)
    {

    try{

        $validated = $request->validated();
        $departments = Department::create($request->all());
        $departments->save();
        $departments->classes()->attach($request->clas_id);
        toastr()->success('Department has been saved successfully!');

                return redirect()->route('departments.index');
    }

    catch(\Exception $e){
        return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDepartments $request)
    {
        try {

            $validated = $request->validated();
            $department = Department::findOrFail($request->id);
            $department->update($request->all());
            if (isset($request->clas_id)){
                $department->classes()->sync($request->clas_id);
            }
            else{
                $department->classes()->sync(array());
            }
            toastr()->success('Department has been updated successfully!');
            return redirect()->route('departments.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $department = Department::findOrFail($request->id);
        $department->delete();
        toastr()->error('Department has been deleted successfully!','Delete');
        return redirect()->route('departments.index');
    }
}
