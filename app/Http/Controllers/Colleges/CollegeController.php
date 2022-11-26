<?php

namespace App\Http\Controllers\Colleges;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColleges;
use App\Models\College;
use App\Models\Department;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = College::all();
        return view('colleges.colleges',compact('colleges'));
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
    public function store(StoreColleges $request)
    {
        try{

            $validated = $request->validated();
            $college = College::create($request->all());
            $college->save();
            toastr()->success('College has been saved successfully!');

                return redirect()->route('colleges.index');



        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function show(College $college)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function edit(College $college)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function update(StoreColleges $request, College $college)
    {
        try{

            $validated = $request->validated();
            $college = College::findOrFail($request->id);
            $college->update($request->all());
            toastr()->success('College has been updated successfully!');

            return redirect()->route('colleges.index');



        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, College $college)
    {
        $department_id = Department::where('colleges_id',$request->id)->pluck('colleges_id');

        if($department_id->count() == 0){

          $college = College::findOrFail($request->id)->delete();
            toastr()->error('College has been deleted successfully!','Delete');
            return redirect()->route('colleges.index');
        }

        else{

            toastr()->warning('It is not possible to delete the college because there are departments attached to it','Warning');
            return redirect()->route('colleges.index');

        }
    }
}
