@extends('layouts.app1')

@section('content')
    @if (count($artworks) > 0)
        <div class="panel panel-default" >
        <br>
        <br>
        <br>
        <br>
        <h1 class="text-center" style="font-size: 40px; font-family: Lato !important;"> ARTISTS INDEX </h1>


        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                        <div class="loginmodal-container">
                        <div onclick="$('#login-modal, .fade, .modal').hide(); $(body).removeClass('modal-open')"><i class="fa fa-times fa-2x"></i></div>
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

         <div class="letter-index text-center" style="margin-bottom: 50px;">
         <a href="{{ url('/search/?query=A&dbField=artist') }}">A</a>|
         <a href="{{ url('/search/?query=B&dbField=artist') }}">B</a>|
         <a href="{{ url('/search/?query=C&dbField=artist') }}">C</a>|
         <a href="{{ url('/search/?query=D&dbField=artist') }}">D</a>|
         <a href="{{ url('/search/?query=E&dbField=artist') }}">E</a>|
         <a href="{{ url('/search/?query=F&dbField=artist') }}">F</a>|
         <a href="{{ url('/search/?query=G&dbField=artist') }}">G</a>|
         <a href="{{ url('/search/?query=H&dbField=artist') }}">H</a>|
         <a href="{{ url('/search/?query=I&dbField=artist') }}">I</a>|
         <a href="{{ url('/search/?query=J&dbField=artist') }}">J</a>|
         <a href="{{ url('/search/?query=K&dbField=artist') }}">K</a>|
         <a href="{{ url('/search/?query=L&dbField=artist') }}">L</a>|
         <a href="{{ url('/search/?query=M&dbField=artist') }}">M</a>|
         <a href="{{ url('/search/?query=N&dbField=artist') }}">N</a>|
         <a href="{{ url('/search/?query=O&dbField=artist') }}">O</a>|
         <a href="{{ url('/search/?query=P&dbField=artist') }}">P</a>|
         <a href="{{ url('/search/?query=Q&dbField=artist') }}">Q</a>|
         <a href="{{ url('/search/?query=R&dbField=artist') }}">R</a>|
         <a href="{{ url('/search/?query=S&dbField=artist') }}">S</a>|
         <a href="{{ url('/search/?query=U&dbField=artist') }}">U</a>|
         <a href="{{ url('/search/?query=T&dbField=artist') }}">T</a>|
         <a href="{{ url('/search/?query=V&dbField=artist') }}">V</a>|
         <a href="{{ url('/search/?query=W&dbField=artist') }}">W</a>|
         <a href="{{ url('/search/?query=X&dbField=artist') }}">X</a>|
         <a href="{{ url('/search/?query=Y&dbField=artist') }}">Y</a>|
         <a href="{{ url('/search/?query=Z&dbField=artist') }}">Z</a>
         </div>


            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">

                        <!-- Table Headings -->
                        <thead>
                            <th style="font-size: 16px;">Title</th>
                            <th style="font-size: 16px;">Artist</th>
                            <th style="font-size: 16px;">Year</th>
                            <th style="font-size: 16px;">Medium</th>
                            <th style="font-size: 16px;">Art Fair</th>
                            <th style="font-size: 16px;">Art Fair Date</th>
                            <th style="font-size: 16px;">Gallery</th>
                            <th style="font-size: 16px;">Price</th>
                            @if (Auth::id() == 1) 
                            <th></th>
                            <th></th>
                            @endif
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            @foreach ($artworks as $artwork)
                                <tr >
                                    <!-- Showing all artworks -->
                                    @if ($artwork->image == '')
                                    <td class="table-text table-hover " onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>
                                            <h5>{{ $artwork->artwork }}</h5>
                                        </div>
                                    </td>

                                    @else 
                                    <td class="table-text table-hover " onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>
                                            <img src="{{ $artwork->image }}" class="thumbnail">
                                            <h5>{{ $artwork->artwork }}</h5>
                                        </div>
                                    </td>
                                    @endif


                                    <td class="table-text" onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>{{ $artwork->artist }}</div>
                                        <a href="{{ url('artwork/'.$artwork->id) }}"><strong style="font-family: 'Didact Gothic', sans-serif;">SEE DETAILS</strong></a>
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

                                    <td class="table-text" onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>{{ $artwork->gallery_name }}</div>
                                    </td>                                

                                    @if (Auth::guest())
                                         <td class="table-text">
                                         <br>
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
         <h1 class="text-center" style="font-size: 40px;"> Artists Index </h1>

            <div class="panel-body">
            <h5>There are no results for your query. Please try searching something else.</h5>
            </div>
        </div>

    @endif
@endsection