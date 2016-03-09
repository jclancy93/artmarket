@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row">

            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                        <div class="loginmodal-container">
                        <div onclick="$('#login-modal, .modal, .fade').hide();  $(body).removeClass('modal-open')"><i class="fa fa-times fa-2x"></i></div>
                            <h1>ART MARKET</h1>
                            <h4 class="text-center">Log In or Sign up to see auction results</h4>
                          <form method="POST" action="{{ url('/login') }}">
                          {!! csrf_field() !!}
                            <input type="text" name="email" placeholder="Email">
                            <input type="password" name="password" placeholder="Password">
                            <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                          </form>
                          <button type="submit" name="login" class="login loginmodal-submit" value="Login" style="width: 100%;" onclick="location.href='{{ url('/register') }}'">Register</button>
                          <div class="login-help">
                            <a href="{{ url('/password/reset') }}">Forgot Password</a>
                          </div>
                        </div>
                    </div>
                  </div>
        <div class="col-md-6" style="top: 175px; font-famiy: Lato !important">
              <a class="btn btn-default" href="{{ URL::previous() }}" style="margin-top: -100px;"><i class="fa fa-chevron-left"></i><strong>BACK TO SEARCH</strong></a>

         @if ($artwork->image == '')
          <h4>{{$artwork->artist_firstname}} {{$artwork->artist_lastname}}</h4>
           <h4 style="font-style: italic; font-family: Lato"><strong>{{$artwork->artwork}}</strong></h4>
           <h4>Artwork Year: {{$artwork->year}}</h4>
           <hr>
           <h4>Art Fair Date: {{$artwork->art_fair}}{{$artwork->art_fair_date}}</h4>
           <h4>Gallery Name: {{$artwork->gallery_name}}</h4>
           <br>
           @if (Auth::guest())
           <a href="#" data-toggle="modal" data-target="#login-modal"><strong style="color: black; font-family: Roboto; font-weight: boldest; padding: 10px; border: 1px solid;">LOG IN TO SEE PRICES</strong></button></a>
           <br>
           @else
           <h4>Price: {{$artwork->price}}</h4>
           @endif
        </div>
        <div class="col-md-4 col-md-offset-1" style="top: 175px;">
           <h4>Medium: {{$artwork->medium}}</h4>
           <h4>Category: {{$artwork->category}}</h4>
           <h4>Measurements: {{$artwork->dimensions}} </h4>
           <br>
           <hr>
           <h4>Notes: {{$artwork->notes}}</h4>
        </div>
         @else 
                    <h4>{{$artwork->artist_firstname}} {{$artwork->artist_lastname}}</h4>
           <h4 style="font-style: italic; font-family: Lato"><strong>{{$artwork->artwork}}</strong></h4>
           <h4>Artwork Year: {{$artwork->year}}</h4>
           <hr>
           <h4>Art Fair Date: {{$artwork->art_fair}}{{$artwork->art_fair_date}}</h4>
           <h4>Gallery Name: {{$artwork->gallery_name}}</h4>
           <br>
           @if (Auth::guest())
           <a href="#" data-toggle="modal" data-target="#login-modal"><strong style="color: black; font-family: Roboto; font-weight: boldest; padding: 10px; border: 1px solid;">LOG IN TO SEE PRICES</strong></button></a>
           <br>
           @else
           <h4>Price: {{$artwork->price}}</h4>
           @endif
            <h4>Medium: {{$artwork->medium}}</h4>
           <h4>Category: {{$artwork->category}}</h4>
           <h4>Measurements: {{$artwork->dimensions}} </h4>
           <br>
           <hr>
           <h4>Notes: {{$artwork->notes}}</h4>
        </div>
        <div class="col-md-4 col-md-offset-1" style="top: 175px;">
            <img src="{{ $artwork->image }}" style="width: 400px">
        </div>
         @endif
    </div>
</div>
@endsection
