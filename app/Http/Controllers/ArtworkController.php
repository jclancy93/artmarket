<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artwork;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return all Artworks

        $artworks = Artwork::all();

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
        $artwork->artist = $params['artist'];
        $artwork->artwork = $params['artwork'];
        $artwork->price = $params['price'];
        $artwork->notes = $params['notes'];

        $artwork->save();


        if (isset($params['image'])) {
            # code...
            $imageName = $artwork->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('../public/img/art_images', $imageName);

            return redirect()->action('ArtworkController@index');
        }     

        else {
            return redirect()->action('ArtworkController@index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
