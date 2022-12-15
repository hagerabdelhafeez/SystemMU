<?php

namespace App\Http\Controllers\Curriculums;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\College;
use App\Models\Department;
use App\Models\Clas;
use App\Models\Semester;
use App\Models\Course;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $colleges=College::findOrfail(4);
        // return $colleges->curriculum;
        $curriculums = Curriculum::all();
        $colleges = College::all();
        $departments = Department::all();
        $classes = Clas::all();
        $semesters = Semester::all();
        $courses = Course::all();
        return view('curriculums.curriculums', compact('curriculums', 'colleges', 'departments', 'classes', 'semesters', 'courses'));
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
    public function store(Request $request)
    {
        try{
            $this->validate($request,[
                'colleges_id'=>'required',
                'departments_id'=>'required',
                'class_id'=>'required',
                'semesters_id'=>'required',
                'courses_id'=>'required',
            ]);

                // $curriculum =new Curriculum();
                // $curriculum->colleges_id = $request->colleges_id;
                // $curriculum->departments_id= $request->departments_id;
                // $curriculum->class_id = $request->class_id;
                // $curriculum->semesters_id = $request->semesters_id;
                // $curriculum->courses_id = array($request->courses_id);
                $colleges_id = $request->colleges_id;
                $departments_id = $request->departments_id;
                $class_id = $request->class_id;
                $semesters_id = $request->semesters_id;
                $courses_id = $request->courses_id;
                $insertData=[];
                for($i=0;$i<count($courses_id);$i++){
                    array_push($insertData,['colleges_id'=>$colleges_id,'departments_id'=>$departments_id,'class_id'=>$class_id,'semesters_id'=>$semesters_id,'courses_id'=>$courses_id[$i]]);

                }

                Curriculum::insertOrIgnore($insertData);


                // $curriculum=$request->all();
                // $courses_id= $curriculum['courses_id'];
                // $curriculum['courses_id']=$courses_id;
                // Curriculum::create($curriculum);

                // $curriculum = Curriculum::create($request->all());
                //  $curriculum->save();

            toastr()->success('Curriculum has been saved successfully!');

                    return redirect()->route('curriculums.index');
        }

        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }

        // dd($request->all());

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
    public function edit($id)
    {
        $curriculum = Curriculum::findOrFail($id);
        $colleges = College::all();
        $departments = Department::all();
        $classes = Clas::all();
        $semesters = Semester::all();
        $courses = Course::all();

        return view('curriculums.edit',compact('curriculum', 'colleges', 'departments', 'classes', 'semesters', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curriculum $curriculum)
    {
        try {

            $curriculum = Curriculum::findOrFail($request->id);
            $this->validate( $request,[
                'colleges_id'=>'required',
                'departments_id'=>'required',
                'class_id'=>'required',
                'semesters_id'=>'required',
                'courses_id'=>'required',
            ]);


            $curriculum->update($request->all());
            toastr()->success('Curriculum has been updated successfully!');
            return redirect()->route('curriculums.index');
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
    public function destroy(Request $request,Curriculum $curriculum)
    {
        $curriculum = Curriculum::findOrFail($request->id);
        $curriculum->delete();
        toastr()->error('Curriculum has been deleted successfully!','Delete');
        return redirect()->route('curriculums.index');
    }
}
