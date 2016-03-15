@extends('layouts.app')

@section('content')
<div id="gradient"/>
<div class="container">
    <div class="row row-fluid">
        <div class="search-container" class="col-md-6 col-md-offset-3" style="background-color: white; padding: 25px; height: 250px; width: 600px; position: absolute; top:0; bottom: 0; left: 0; right: 0; margin: auto;">
        <h2 class="text-center search-text">SEARCH ARTWORKS</h2>
        <div class="autocomplete">
             <!--
            {{ Form::open(array('url' => 'words/means/', 'class' => 'navbar-form navbar-left', 'method' => 'POST')) }}
             {{ Form::submit('Submit', array('class' => 'btn btn-default')) }}
             
             -->
        </div>
        <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Search by Artist Name, Art Fair, etc." id="auto" name="query" form="searchForm"/>
                <!--{{ Form::open(array('url' => 'getdata', 'method' => 'POST')) }} 
                {{ Form::text('query',$value = null, array('placeholder' => 'Please type a word or phrase', 'id' => 'auto', 'class' => 'form-control')) }}-->
                <!--{{ Form::close() }}-->
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg open">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form" id="searchForm" action="/search" method="GET">
                                  <div class="form-group">
                                    <label for="filter">Filter by</label>
                                    <select class="form-control" name="dbField">
                                        <option value="artist_fullname" selected>Artist Last Name</option>
                                        <option value="medium">Medium</option>
                                        <option value="artwork">Artwork Name</option>
                                        <option value="art_fair">Art Fair</option>
                                        <option value="gallery_name">Gallery Name</option>
                                    </select>
                                  </div>
                                  <button type="submit" class="btn btn-primary" style="width: 100%;"><span class="glyphicon glyphicon-search" aria-hidden="true" style="margin-right: 5px;"></span>SEARCH</button>
                                </form>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" form="searchForm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div> 
                </div>
            </div>
          </div>
        </div>
        </div>
    </div>
</div>
</div>
@endsection
