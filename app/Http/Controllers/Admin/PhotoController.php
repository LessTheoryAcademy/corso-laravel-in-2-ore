<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all();
        
        $data = [
            "photos" => $photos
        ];
        
        return view('photos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'url' => 'required|max:100'
        ]);

        $photo = new Photo();

        $photo->title = $request->input('title');
        $photo->url = $request->input('url');

        $photo->save();

        return redirect()->route('photos.index')->with('success', 'Photo added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        $data = [
            "photo" => $photo
        ];

        return view('photos.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        $data = [
            "photo" => $photo
        ];
		
        return view('photos.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'title' => 'required|max:100',
            'url' => 'required|max:100'
        ]);
                
        $photo->title = $request->input('title');
        $photo->url = $request->input('url');

        $photo->save();

        return redirect()->route('photos.index')->with('success', 'Photo saved successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();

        return redirect()->route('photos.index')->with('success', 'Photo removed successfully'); 
    }
}
