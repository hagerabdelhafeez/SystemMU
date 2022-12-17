<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Gender;
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
        return view('teachers.create',compact('genders'));
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
            $teacher->password = Hash::make($request->password);

            $teacher->save();

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
        //
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
        return view('teachers.edit',compact('teacher','genders'));
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
            $teacher->password = Hash::make($request->password);

            $teacher->save();


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
