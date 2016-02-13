@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row">

            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                        <div class="loginmodal-container">
                        <div onclick="$('#login-modal, .modal, .fade').hide();"><i class="fa fa-times fa-2x"></i></div>
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
        <div class="col-md-6" style="top: 175px;">
              <a class="btn btn-default" href="{{ URL::previous() }}" style="margin-top: -100px;"><i class="fa fa-chevron-left"></i><strong>BACK TO SEARCH</strong></a>

           <h4>{{$artwork->artist}}</h4>
           <h4>{{$artwork->artwork}}</h4>
           <h4>{{$artwork->year}}</h4>
           <hr>
           <h4>{{$artwork->art_fair}}</h4>
           <h4>{{$artwork->gallery_name}}</h4>
           <br>
           @if (Auth::guest())
           <a href="#" data-toggle="modal" data-target="#login-modal"><strong style="color: black; font-family: Roboto; font-weight: boldest; padding: 10px; border: 1px solid;">LOG IN TO SEE PRICES</strong></button></a>
           @else
           <h4>${{$artwork->price}}</h4>
           @endif
           <hr>
           <h4>Medium: {{$artwork->medium}}</h4>
           <h4>Materials: </h4>
           <h4>Measurements: </h4>
           <hr>
           <h4>Notes: {{$artwork->notes}}</h4>
        </div>
        <div class="col-md-4 col-md-offset-1" style="top: 175px;">
          @if ($artwork->image == '')
            <img src="/../../img/art_images/image_unavailable.png" style="width: 400px;">
          @else 
            <img src="{{ $artwork->image }}" style="width: 400px" class="drilldown-image">
          @endif
        </div>
    </div>
</div>
@endsection
