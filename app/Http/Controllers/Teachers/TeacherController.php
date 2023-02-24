<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Blood;
use App\Models\Religon;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeachers;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.teachers', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::all();
        $religons = Religon::all();
        $bloods = Blood::all();
        $nationalities = Nationality::all();
        $departments = Department::all();
        $courses = Course::all();
        return view('teachers.create',compact('genders','religons','bloods','nationalities','departments','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeachers $request)
    {
        try{

            $validated = $request->validated();

            $teacher = new Teacher();
            $teacher->teacher_name = $request->teacher_name;
            $teacher->mobile_number = $request->mobile_number;
            $teacher->Address = $request->Address;
            $teacher->email = $request->email;
            $teacher->genders_id = $request->genders_id;
            $teacher->nationalities_id = $request->nationalities_id;
            $teacher->blood_id = $request->blood_id;
            $teacher->religons_id = $request->religons_id;
            $teacher->date_birth = $request->date_birth;
            $teacher->degree = $request->degree;
            $teacher->departments_id = $request->departments_id;
            $teacher->password = Hash::make($request->password);

            $teacher->save();
            $teacher->courses()->attach($request->course_id);

            toastr()->success('Teacher has been saved successfully!');

            return redirect()->route('teachers.index');
        }

        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $genders = Gender::all();
        $religons = Religon::all();
        $bloods = Blood::all();
        $nationalities = Nationality::all();
        $departments = Department::all();
        $courses = Course::all();
        return view('teachers.edit',compact('teacher','genders','religons','bloods','nationalities','departments','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTeachers $request)
    {

        try{

            $validated = $request->validated();

            $teacher = Teacher::findOrFail($request->id);
            $teacher->teacher_name = $request->teacher_name;
            $teacher->mobile_number = $request->mobile_number;
            $teacher->Address = $request->Address;
            $teacher->email = $request->email;
            $teacher->genders_id = $request->genders_id;
            $teacher->nationalities_id = $request->nationalities_id;
            $teacher->blood_id = $request->blood_id;
            $teacher->religons_id = $request->religons_id;
            $teacher->date_birth = $request->date_birth;
            $teacher->degree = $request->degree;
            $teacher->departments_id = $request->departments_id;
            $teacher->password = Hash::make($request->password);

            $teacher->save();
            if (isset($request->course_id)){
                $teacher->courses()->sync($request->course_id);
            }
            else{
                $teacher->courses()->sync(array());
            }


            toastr()->success('Teacher has been updated successfully!');

            return redirect()->route('teachers.index');
        }

        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $teacher = Teacher::findOrFail($request->id);
        $teacher->delete();
        toastr()->error('Teacher has been deleted successfully!','Delete');
        return redirect()->route('teachers.index');
    }
}
