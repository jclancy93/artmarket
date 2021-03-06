<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;            // this handles both for Input and Request as in laravel 5.1 documentation


use App\Artwork;
use App\Http\Controllers\Input;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Return all Artworks

        $term = $request->input('query');
        $dbField = $request->input('dbField');
        $sortBy = $request->input('sortBy');
        if (is_null($sortBy)) {
            $sortBy = 'artist_lastname';
        }
        if (is_null($term)) {
            $term = '';
        }
        if (is_null($dbField)) {
            $dbField = 'artist_lastname';
        }
        

        if(isset($term)) {
            $artworks = Artwork::where(strtolower($dbField), 'LIKE', '%'.$term.'%')->orderBy($sortBy, 'asc')->get();
        } else {
            $artworks = Artwork::all();
        }

        return view('artworks.index')->with('artworks', $artworks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        if ($request->user()) {
            // $request->user() returns an instance of the authenticated user...
            return view('artworks.create');
        }

        else {
            return view('auth/login');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->input();

        $artwork = new Artwork;
        $artwork->artist_firstname = $params['artist_firstname'];
        $artwork->artist_lastname = $params['artist_lastname'];
        $artwork->artist_fullname = $params['artist_firstname'] . " " . $params['artist_lastname'];
        $artwork->artwork = $params['artwork'];
        $artwork->category = $params['category'];
        $artwork->year = $params['year'];
        $artwork->medium = $params['medium'];
        $artwork->art_fair = $params['art_fair'];
        $artwork->art_fair_year = $params['art_fair_year'];
        $artwork->gallery_name = $params['gallery_name'];
        $artwork->dimensions = $params['dimensions'];
        $artwork->price = $params['price'];
        $artwork->notes = $params['notes'];
        $artwork->citation = $params['citation'];


        if ($request->file('image')) {
            $image = $request->file('image');
            $imageFileName = time() . '.' . $image->getClientOriginalExtension();
            $s3 = \Storage::disk('s3');
            $filePath = $imageFileName;
            $s3->put($filePath, file_get_contents($image), 'public');
            $storagePath  = 'https://s3.amazonaws.com/artmarket-assets/' . $imageFileName;
            $artwork->image = $storagePath;
        }

        $artwork->save();

        return redirect()->action('ArtworkController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$artwork = Artwork::find($id);
        $artwork = Artwork::find($id);
        return view('artworks.show', ['artwork' => $artwork]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $artwork = Artwork::find($id);
        return view('artworks.edit', ['artwork' => $artwork]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->input();

        $artwork = Artwork::find($id);
        $artwork->artist_firstname = $params['artist_firstname'];
        $artwork->artist_lastname = $params['artist_lastname'];
        $artwork->artist_fullname = $params['artist_firstname'] . " " . $params['artist_lastname'];
        $artwork->artwork = $params['artwork'];
        $artwork->category = $params['category'];
        $artwork->year = $params['year'];
        $artwork->medium = $params['medium'];
        $artwork->art_fair = $params['art_fair'];
        $artwork->art_fair_year = $params['art_fair_year'];
        $artwork->gallery_name = $params['gallery_name'];
        $artwork->dimensions = $params['dimensions'];
        $artwork->price = $params['price'];
        $artwork->notes = $params['notes'];
        $artwork->citation = $params['citation'];

        if ($request->file('image1')) {
            $image = $request->file('image1');
                $imageFileName = time() . '.' . $image->getClientOriginalExtension();
                $s3 = \Storage::disk('s3');
                $filePath = $imageFileName;
                $s3->put($filePath, file_get_contents($image), 'public');
                $storagePath  = 'https://s3.amazonaws.com/artmarket-assets/' . $imageFileName;
                $artwork->image = $storagePath;
        }

        $artwork->save();

        return redirect()->action('ArtworkController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request, $id)
    {
        $artwork = Artwork::find($id);

        $artwork->delete();
        
        return redirect('/artworks');
    }

}
