<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artwork;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArtworksController extends Controller
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
    public function create()
    {
        return view('artworks.create');

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

        $imageName = $artwork->id . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move('../public/img/art_images', $imageName);

        return redirect()->action('ArtworksController@index');
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
    public function destroy($id)
    {
        //
    }
}
