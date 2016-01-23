@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="top: 175px;">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
 			<form method="POST" action="/artworks" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<label for="artwork">Artwork Name</label>
				<input id="artwork" name="artwork" type="text">
				<label for="artist">Artist</label>
				<input id="artist" name="artist" type="text">
				<label for="price">Price</label>
				<input id="price" name="price" type="text">
				<label for="notes">Description</label>
				<input id="notes" name="notes" type="text">
				<label for="image">image</label>
				<input id="image" name="image" type="file" accept="image/png">
				<input class="btn btn-info" type="submit" value="Add Product">
			</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
