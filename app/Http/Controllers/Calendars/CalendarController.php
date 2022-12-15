<?php

namespace App\Http\Controllers\Calendars;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCalendars;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calendars = Calendar::all();
        return view('calendars.calendars',compact('calendars'));
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
    public function store(StoreCalendars $request)
    {
        try{
                $validated = $request->validated();
                $calendar = Calendar::create([
                    'events' => $request->events,
                    'dates' => $request->dates,

                ]);

                $calendar->save();

                toastr()->success('Calendar has been saved successfully!');
                return redirect()->route('calendars.index');
            }

        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCalendars $request)
    {
        try {
            $validated = $request->validated();
            $calendar = Calendar::findOrFail($request->id);
            $calendar->update([
                'events' => $request->events,
                'dates' => $request->dates,

            ]);
            toastr()->success('Calendar has been updated successfully!');
            return redirect()->route('calendars.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $calendar = Calendar::findOrFail($request->id);
        $calendar->delete();
        toastr()->error('Calendar has been deleted successfully!','Delete');
        return redirect()->route('calendars.index');
    }
}
