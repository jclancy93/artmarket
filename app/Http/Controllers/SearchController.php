<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artwork;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // request search query term & field for search
        $term = $request->input('query');
        $dbField = $request->input('dbField');
        $sortBy = $request->input('sortBy');
        if (is_null($sortBy)) {
            $sortBy = 'artist_fullname';
        }
        

        if(isset($term)) {
            if ($dbField == 'artist_lastname') {
               $artworks = Artwork::where(strtolower($dbField), 'ILIKE', ''.$term.'%')->orderBy($sortBy, 'asc')->get();
            }
            elseif ($dbField == 'art_fair_year') {
               $artworks = Artwork::where(strtolower($dbField), 'ILIKE', '%'.$term.'%')->orderBy($sortBy, 'asc')->get();
            }
            else {
            $artworks = Artwork::where(strtolower($dbField), 'ILIKE', '%'.$term.'%')->orderBy($sortBy, 'asc')->get();
        }
        } else {
            $artworks = Artwork::all();
        }

        // Pass in articles data to view
        return view('search.index', ['artworks' => $artworks]);
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
        //
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
