@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="top: 175px;">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
 			<form method="POST" action="/artworks/{{$artwork->id}}" enctype="multipart/form-data" class="text-center">
 				{{ method_field('PUT') }}
 				{!! csrf_field() !!}
				<label for="artwork">Artwork Name</label>
				<input id="artwork" name="artwork" type="text" value={{$artwork->artwork}}>
				<br><br>
				<label for="artist">Artist</label>
				<input id="artist" name="artist" type="text" value={{$artwork->artist}}>
				<br><br>
				<label for="price">Price</label>
				<input id="price" name="price" type="text" value={{$artwork->price}}>
				<br><br>
				<label for="notes">Description</label>
				<input id="notes" name="notes" type="text" value={{$artwork->notes}}>
				<br><br>
				<label for="image">image</label>
				<input id="image" name="image" type="file" accept="image/png" style="margin-left: 35%;">
				<br><br>
				<input class="btn btn-info" type="submit" value="Edit Product">
			</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
