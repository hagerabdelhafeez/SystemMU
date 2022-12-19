<?php

namespace App\Http\Controllers\Students;

use App\Models\Student;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Blood;
use App\Models\Religon;
use App\Models\Department;
use App\Models\College;
use App\Models\Clas;
use App\Models\Year;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.students', compact('students'));
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
        $colleges = College::all();
        $classes = Clas::all();
        $years = Year::all();
        return view('students.create',compact('genders','religons','bloods','nationalities','departments','colleges','classes','years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudents $request)
    {
        try{

            $validated = $request->validated();

            $student = new Student();
            $student->student_name = $request->student_name;
            $student->mobile_number = $request->mobile_number;
            $student->Address = $request->Address;
            $student->email = $request->email;
            $student->genders_id = $request->genders_id;
            $student->nationalities_id = $request->nationalities_id;
            $student->blood_id = $request->blood_id;
            $student->religons_id = $request->religons_id;
            $student->date_birth = $request->date_birth;
            $student->student_no = $request->student_no;
            $student->departments_id = $request->departments_id;
            $student->colleges_id = $request->colleges_id;
            $student->class_id = $request->class_id;
            $student->years_id = $request->years_id;
            $student->password = Hash::make($request->password);

            $student->save();

            toastr()->success('Student has been saved successfully!');

            return redirect()->route('students.index');
        }

        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $genders = Gender::all();
        $religons = Religon::all();
        $bloods = Blood::all();
        $nationalities = Nationality::all();
        $departments = Department::all();
        $colleges = College::all();
        $classes = Clas::all();
        $years = Year::all();
        return view('students.edit',compact('student','genders','religons','bloods','nationalities','departments','colleges','classes','years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudents $request, Student $student)
    {
        try{

            $validated = $request->validated();
            $student = Student::findOrFail($request->id);
            $student->student_name = $request->student_name;
            $student->mobile_number = $request->mobile_number;
            $student->Address = $request->Address;
            $student->email = $request->email;
            $student->genders_id = $request->genders_id;
            $student->nationalities_id = $request->nationalities_id;
            $student->blood_id = $request->blood_id;
            $student->religons_id = $request->religons_id;
            $student->date_birth = $request->date_birth;
            $student->student_no = $request->student_no;
            $student->departments_id = $request->departments_id;
            $student->colleges_id = $request->colleges_id;
            $student->class_id = $request->class_id;
            $student->years_id = $request->years_id;
            $student->password = Hash::make($request->password);

            $student->save();


            toastr()->success('Student has been updated successfully!');

            return redirect()->route('students.index');
        }

        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        toastr()->error('Student has been deleted successfully!','Delete');
        return redirect()->route('students.index');
    }


}
