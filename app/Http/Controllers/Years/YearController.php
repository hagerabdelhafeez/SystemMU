<?php

namespace App\Http\Controllers\Years;

use App\Http\Controllers\Controller;
use App\Models\Year;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Requests\StoreYears;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::all();
        $semesters = Semester::all();
        return view('years.years',compact('years','semesters'));
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
    public function store(StoreYears $request)
    {
        try{

            $validated = $request->validated();
            $year = Year::create($request->all());
            $year->save();
            $year->semesters()->attach($request->semester_id);
            toastr()->success('Year has been saved successfully!');

                return redirect()->route('years.index');



        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function show(Year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit(Year $year)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(StoreYears $request)
    {
        try{

            $validated = $request->validated();
            $year = Year::findOrFail($request->id);
            $year->update($request->all());
            if (isset($request->semester_id)){
                $year->semesters()->sync($request->semester_id);
            }
            else{
                $year->semesters()->sync(array());
            }
            toastr()->success('Year has been updated successfully!');

                return redirect()->route('years.index');



        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $year = Year::findOrFail($request->id)->delete();
            toastr()->error('Year has been deleted successfully!','Delete');
            return redirect()->route('years.index');
    }
}
