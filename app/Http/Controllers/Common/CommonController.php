<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Common;
use App\Models\Semester;
use App\Models\Course;
use App\Models\Year;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommons;

class CommonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commons = Common::all();
        $departments = Department::all();
        $semesters = Semester::all();
        $courses = Course::all();
        $years = Year::all();
        return view('common.common', compact('commons','departments','courses','years','semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $semesters = Semester::all();
        $courses = Course::all();
        $years = Year::all();

        return view('common.create', compact('departments','courses','years','semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommons $request)
    {
        try{

            $validated = $request->validated();
            $common = new Common();
            $common->departments_id = $request->departments_id;
            $common->semesters_id = $request->semesters_id;
            $common->years_id = $request->years_id;
            $common->save();
            $common->courses()->attach($request->course_id);

            toastr()->success(' saved successfully!');

                    return redirect()->route('commons.index');
        }

        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Common  $common
     * @return \Illuminate\Http\Response
     */
    public function show(Common $common)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Common  $common
     * @return \Illuminate\Http\Response
     */
    public function edit(Common $common)
    {
        $departments = Department::all();
        $semesters = Semester::all();
        $courses = Course::all();
        $years = Year::all();

        return view('common.edit', compact('common','departments','courses','years','semesters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Common  $common
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCommons $request, Common $common)
    {
        try {

            $validated = $request->validated();
            $common->departments_id = $request->departments_id;
            $common->semesters_id = $request->semesters_id;
            $common->years_id = $request->years_id;
            $common->save();
            if (isset($request->course_id)){
                $common->courses()->sync($request->course_id);
            }
            else{
                $common->courses()->sync(array());
            }
            toastr()->success(' updated successfully!');
            return redirect()->route('commons.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Common  $common
     * @return \Illuminate\Http\Response
     */
    public function destroy(Common $common)
    {
        $common->delete();
        toastr()->error(' deleted successfully!','Delete');
        return redirect()->route('commons.index');
    }
}
