<?php

namespace App\Http\Controllers\Curriculum;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\Semester;
use App\Models\Course;
use App\Models\Year;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCurricula;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curricula = Curriculum::all();
        $departments = Department::all();
        $semesters = Semester::all();
        $courses = Course::all();
        $years = Year::all();
        return view('curriculum.curriculum', compact('curricula','departments','courses','years','semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurricula $request)
    {
        try{

            // $this->validate($request,[
            //     'departments_id'=>'required',
            //     'years_id'=>'required',
            //     'semesters_id'=>'required',
            //     'courses_id'=>'required',
            // ]);

            $validated = $request->validated();

            $departments_id = $request->departments_id;
            $years_id = $request->years_id;
            $semesters_id = $request->semesters_id;
            $courses_id = $request->courses_id;
            $insertData=[];
            for($i=0;$i<count($courses_id);$i++){
                array_push($insertData,['years_id'=>$years_id,'departments_id'=>$departments_id,'semesters_id'=>$semesters_id,'courses_id'=>$courses_id[$i]]);

            }

            Curriculum::insertOrIgnore($insertData);


        toastr()->success('Curriculum has been saved successfully!');

                return redirect()->route('curricula.index');
    }

    catch(\Exception $e){
        return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


    }


         //dd($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function show(Curriculum $curriculum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function edit(Curriculum $curriculum)
    {

        $departments = Department::all();
        $semesters = Semester::all();
        $courses = Course::all();
        $years = Year::all();

        return view('curriculum.edit', compact('curriculum','departments','courses','years','semesters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCurricula $request, Curriculum $curriculum)
    {
        try {
            $validated = $request->validated();
            $curriculum = Curriculum::findOrFail($request->id);
            // $this->validate( $request,[
            //     'departments_id'=>'required',
            //     'years_id'=>'required',
            //     'semesters_id'=>'required',
            //     'courses_id'=>'required',
            // ]);


            $curriculum->update($request->all());
            toastr()->success('Curriculum has been updated successfully!');
            return redirect()->route('curricula.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curriculum $curriculum)
    {
        $curriculum->delete();
        toastr()->error('Curriculum has been deleted successfully!','Delete');
        return redirect()->route('curricula.index');
    }
}
