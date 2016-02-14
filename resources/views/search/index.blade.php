@extends('layouts.app1')

@section('content')
    <!-- Create Task Form... -->

    <!-- Current Tasks -->
    @if (count($artworks) > 0)
        <div class="panel panel-default">
        <br>
        <br>
        <br>
        <br>
         <h1 class="text-center" style="font-size: 40px; font-family: Lato !important; text-transform: uppercase;"> {{{ Input::get('dbField') }}} SEARCH RESULTS </h1>
         <h4 class="text-center" style="font-size: 20px; font-weight: 300; font-family: Lato !important;">Results for "{{{ Input::get('query') }}}"</h4>

         <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                        <div class="loginmodal-container">
                        <div onclick="$('#login-modal, .modal, .fade').hide(); $(body).removeClass('modal-open')"><i class="fa fa-times fa-2x"></i></div>
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

           <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">

                        <!-- Table Headings -->
                        <thead style="border-top: 2px solid #dfdfdf">
                            <th style="font-size: 12px;">TITLE</th>
                            <th style="font-size: 12px;">ARTIST</th>
                            <th style="font-size: 12px;">YEAR</th>
                            <th style="font-size: 12px;">MEDIUM</th>
                            <th style="font-size: 12px;">ART FAIR</th>
                            <th style="font-size: 12px;">ART FAIR DATE</th>
                            <th style="font-size: 12px;">GALLERY</th>
                            <th style="font-size: 12px;">PRICE</th>
                            @if (Auth::id() == 1) 
                            <th></th>
                            <th></th>
                            @endif
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            @foreach ($artworks as $artwork)
                                <tr>
                                    <!-- Showing all artworks -->
                                    @if ($artwork->image == '')
                                    <td class="table-text table-hover" onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>
                                            <h5 style="font-style: italic;">{{ $artwork->artwork }}</h5>
                                        </div>
                                    </td>

                                    @else 
                                    <td class="table-text table-hover" onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>
                                            <img src="{{ $artwork->image }}" class="thumbnail">
                                            <h5 style="font-style: italic;">{{ $artwork->artwork }}</h5>
                                        </div>
                                    </td>
                                    @endif


                                    <td class="table-text" onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>{{ $artwork->artist }}</div>
                                        <a href="{{ url('artwork/'.$artwork->id) }}"><strong style="font-family: Lato; color: black">SEE DETAILS</strong></a>
                                    </td>

                                    <td class="table-text" onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>{{ $artwork->year }}</div>
                                    </td>

                                    <td class="table-text" onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>{{ $artwork->medium }}</div>
                                    </td>

                                    <td class="table-text" onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>{{ $artwork->art_fair }}</div>
                                    </td>  

                                    <td class="table-text" onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>{{ $artwork->art_fair_year }}</div>
                                    </td>  

                                    <td class="table-text"onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>{{ $artwork->gallery_name }}</div>
                                    </td>                                

                                    @if (Auth::guest())
                                         <td class="table-text">
                                            <a href="#" data-toggle="modal" data-target="#login-modal"><button class="btn btn-info">LOG IN TO SEE PRICES</button></a>
                                        </td>

                                    @else
                                        <td class="table-text" onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                            <div>{{ $artwork->price }}</div>
                                        </td>
                                    @endif

                                    @if (Auth::id() === 1)
                                    <td class="table-text">
                                        <a href="{{ url('/artwork/'.$artwork->id.'/edit') }}"><button class="btn btn-info">EDIT</button></a>
                                    </td>
                                    <td class="table-text">
                                        <form action="{{ url('artwork/'.$artwork->id) }}" method="POST">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}

                                            <button class="btn btn-info">DELETE</button>
                                        </form>
                                    </td>
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     @else 


        <div class="panel panel-default" >
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a class="btn btn-default" href="{{ URL::previous() }}"><i class="fa fa-chevron-left"></i><strong>BACK TO SEARCH</strong></a>
        <h1 class="text-center" style="font-size: 40px; font-family: Lato !important; text-transform: uppercase;"> {{{ Input::get('dbField') }}} SEARCH RESULTS </h1>
         <h4 class="text-center" style="font-size: 20px; font-weight: 300; font-family: Lato !important;">Results for "{{{ Input::get('query') }}}"</h4>

            <div class="panel-body">
            <h3 class="text-center" style="font-family: Lato;">There are no results for your query. Please try searching something else.</h3>
            </div>
        </div>

    @endif
@endsection