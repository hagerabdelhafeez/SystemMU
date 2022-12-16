<?php

namespace App\Http\Controllers\Semesters;

use App\Models\Semester;
use App\Models\Year;
use App\Models\Clas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSemesters;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::all();
        $classes = Clas::all();
        return view('semesters.semesters', compact('semesters', 'classes'));
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
    public function store(StoreSemesters $request)
    {
        try{

            $validated = $request->validated();
                $semesters = Semester::create($request->all());
                $semesters->save();

            toastr()->success('Semester has been saved successfully!');

                    return redirect()->route('semesters.index');
        }

        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSemesters $request)
    {
        try {

            $validated = $request->validated();
            $semester = Semester::findOrFail($request->id);
            $semester->update($request->all());
            toastr()->success('Semester has been updated successfully!');
            return redirect()->route('semesters.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $semester = Semester::findOrFail($request->id);
        $semester->delete();
        toastr()->error('Semester has been deleted successfully!','Delete');
        return redirect()->route('semesters.index');
    }
}
