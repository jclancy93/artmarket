@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6" style="top: 175px;">
           <h4>{{$artwork->artist}}</h4>
           <h4>{{$artwork->artwork}}</h4>
           <h4>{{$artwork->year}}</h4>
           <hr>
           <h4>{{$artwork->art_fair}}</h4>
           <h4>{{$artwork->gallery_name}}</h4>
           <h4>${{$artwork->price}}</h4>
           <hr>
           <h4>Medium: {{$artwork->medium}}</h4>
           <h4>Materials: </h4>
           <h4>Measurements: </h4>
           <hr>
           <h4>Notes: {{$artwork->notes}}</h4>
        </div>
        <div class="col-md-4 col-md-offset-1" style="top: 175px;">
           <img src="/../../img/art_images/image_unavailable.png" style="width: 400px;">
        </div>
    </div>
</div>
@endsection
