	<div class="col-md-12">
		<div class="card-header">
			<img src="/images/globely_logo.png" alt="Globely Icon">
		</div>
		<div class="card-content">
			<form method="POST" action="/artworks" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<label for="artwork">Artwork Name</label>
				<input id="artwork" name="artwork" type="text">
				<label for="artist">Artist</label>
				<input id="artist" name="artist" type="text">
				<label for="price">Price</label>
				<input id="price" name="price" type="number">
				<label for="notes">Description</label>
				<input id="notes" name="notes" type="text">
				<label for="image">image</label>
				<input id="image" name="image" type="file" accept="image/png">
				<input class="btn btn-info" type="submit" value="Add Product">
			</form>
		</div>
	</div>