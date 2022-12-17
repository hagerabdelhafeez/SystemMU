<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Naw;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNews;

class NawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Naw::all();
        return view('news.news',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNews $request)
    {
        try{

            $validated = $request->validated();

            $image_path = $request->photos;
            $newImage = time().$image_path->getClientOriginalName();
            $image_path->move('uploads/images',$newImage);
            $new = Naw::create([
                'photos'=> 'uploads/images/'.$newImage,
                'title' => $request->title,
                'abstract' => $request->abstract,
                'details' => $request->details,
             ]);
            $new->save();

            toastr()->success('New has been saved successfully!');

            return redirect()->route('news.index');
        }

        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Naw  $naw
     * @return \Illuminate\Http\Response
     */
    public function show(Naw $naw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Naw  $naw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $naw = Naw::findOrFail($id);
        return view('news.edit',compact('naw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Naw  $naw
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNews $request)
    {
        try{

                $validated = $request->validated();
                $naw = Naw::findOrFail($request->id);
                
                $image_path = $request->photos;
                $newImage = time().$image_path->getClientOriginalName();
                $image_path->move('uploads/images',$newImage);
                $naw->photos = 'uploads/images'.$newImage;
                $naw->save();

                $naw = Naw::update($request->all());
                toastr()->success('New has been updated successfully!');

                return redirect()->route('news.index');
            }

            catch(\Exception $e){
                return redirect()->back()->withErrors(['error'=> $e -> getMessage()]);


            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Naw  $naw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $naw = Naw::findOrFail($request->id);
        $naw->delete();
        toastr()->error('New has been deleted successfully!','Delete');
        return redirect()->route('news.index');
    }
}
