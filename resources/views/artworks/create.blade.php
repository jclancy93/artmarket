@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="top: 175px;">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
 			<form class="form-horizontal"  method="POST" role="form"  action="/artworks" enctype="multipart/form-data">
        <fieldset>
        	{!! csrf_field() !!}

          <!-- Form Name -->
          <legend class="text-center">Artwork Details</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Artist First Name</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Artist first name" class="form-control" name="artist_firstname">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Artist Lat Name</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Artist last name" class="form-control" name="artist_lastname">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Artwork</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Title" class="form-control" name="artwork">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Gallery</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Gallery" class="form-control" name="gallery_name">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Medium</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Medium" class="form-control" name="medium">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Dimensions</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Dimensions" class="form-control" name="dimensions">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Category</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Category" class="form-control" name="category">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Price</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Price" class="form-control" name="price">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Art Fair</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Art Fair" class="form-control" name="art_fair">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Year</label>
            <div class="col-sm-4">
              <input type="text" placeholder="Year" class="form-control" name="year">
            </div>

            <label class="col-sm-2 control-label" for="textinput">Fair Date</label>
            <div class="col-sm-4">
              <input type="text" placeholder="Fair Date" class="form-control" name="art_fair_year">
            </div>
          </div>



          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Notes</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Notes" class="form-control" name="notes">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Citation</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Citation" class="form-control" name="citation">
            </div>
          </div>

        <div class="col-lg-12 col-sm-12 col-12">
            <span class="file-input btn btn-block btn-primary btn-file">
                Browse for Image Upload&hellip; <input type="file" name="image" multiple>
            </span>
        </div>
        <br>
        <br>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <a href="{{ url('/artworks') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>

        </fieldset>
      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
