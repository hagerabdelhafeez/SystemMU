<?php

namespace App\Http\Controllers\Sliders;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.sliders',compact('sliders'));
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

            $this->validate($request,['sliders_path'=> 'required|image']);

            $sliders_path = $request->sliders_path;
            $newSlider = time().$sliders_path->getClientOriginalName();
            $sliders_path->move('uploads/sliders',$newSlider);
            $slider = Slider::create([
                'sliders_path'=> 'uploads/sliders/'.$newSlider
             ]);
            $slider->save();

            toastr()->success('Slider has been saved successfully!');

            return redirect()->route('sliders.index');
        }

        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        // try{

        //     $slider = Slider::findOrFail($request->id);
        //     $this->validate($request,[
        //         'sliders_path'=> 'required|image'
        //     ]);

        //     $sliders_path = $request->sliders_path;
        //     $newSlider = time().$sliders_path->getClientOriginalName();
        //     $sliders->move('uploads/sliders',$newSlider);
        //     $slider->$sliders_path= 'uploads/sliders'.$newSlider;
        //     $slider->save();

        //     $slider = Slider::update($request->all());
        //     toastr()->success('Slider has been updated successfully!');

        //     return redirect()->route('sliders.index');
        // }

        // catch(\Exception $e){
        //     return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Slider $slider)
    {
        $slider = Slider::findOrFail($request->id);
        $slider->delete();
        toastr()->error('Slider has been deleted successfully!','Delete');
        return redirect()->route('sliders.index');
    }
}
