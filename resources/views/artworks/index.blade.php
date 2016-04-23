@extends('layouts.app1')

@section('content')
    @if (count($artworks) > 0)
        <div class="panel panel-default" id="desktop">
        <br>
        <br>
        <br>
        <br>
         <h1 class="text-center" style="font-size: 40px; font-family: Lato !important; text-transform: uppercase;"> ARTIST INDEX</h1>
         <h4 class="text-center" style="font-size: 20px; font-weight: 300; font-family: Lato !important;"><?php echo count($artworks)?> Results</h4>

         <div class="letter-index text-center" style="margin-bottom: 50px;">
         <a href="{{ url('/search/?query=A&dbField=artist_lastname') }}">A</a>|
         <a href="{{ url('/search/?query=B&dbField=artist_lastname') }}">B</a>|
         <a href="{{ url('/search/?query=C&dbField=artist_lastname') }}">C</a>|
         <a href="{{ url('/search/?query=D&dbField=artist_lastname') }}">D</a>|
         <a href="{{ url('/search/?query=E&dbField=artist_lastname') }}">E</a>|
         <a href="{{ url('/search/?query=F&dbField=artist_lastname') }}">F</a>|
         <a href="{{ url('/search/?query=G&dbField=artist_lastname') }}">G</a>|
         <a href="{{ url('/search/?query=H&dbField=artist_lastname') }}">H</a>|
         <a href="{{ url('/search/?query=I&dbField=artist_lastname') }}">I</a>|
         <a href="{{ url('/search/?query=J&dbField=artist_lastname') }}">J</a>|
         <a href="{{ url('/search/?query=K&dbField=artist_lastname') }}">K</a>|
         <a href="{{ url('/search/?query=L&dbField=artist_lastname') }}">L</a>|
         <a href="{{ url('/search/?query=M&dbField=artist_lastname') }}">M</a>|
         <a href="{{ url('/search/?query=N&dbField=artist_lastname') }}">N</a>|
         <a href="{{ url('/search/?query=O&dbField=artist_lastname') }}">O</a>|
         <a href="{{ url('/search/?query=P&dbField=artist_lastname') }}">P</a>|
         <a href="{{ url('/search/?query=Q&dbField=artist_lastname') }}">Q</a>|
         <a href="{{ url('/search/?query=R&dbField=artist_lastname') }}">R</a>|
         <a href="{{ url('/search/?query=S&dbField=artist_lastname') }}">S</a>|
         <a href="{{ url('/search/?query=U&dbField=artist_lastname') }}">U</a>|
         <a href="{{ url('/search/?query=T&dbField=artist_lastname') }}">T</a>|
         <a href="{{ url('/search/?query=V&dbField=artist_lastname') }}">V</a>|
         <a href="{{ url('/search/?query=W&dbField=artist_lastname') }}">W</a>|
         <a href="{{ url('/search/?query=X&dbField=artist_lastname') }}">X</a>|
         <a href="{{ url('/search/?query=Y&dbField=artist_lastname') }}">Y</a>|
         <a href="{{ url('/search/?query=Z&dbField=artist_lastname') }}">Z</a>
         </div>

         <?php $sortBy = !empty( $_GET['sortBy'] ) ? $_GET['sortBy'] : ''; ?>

        <div class="form-group">
            <div style="position: absolute; margin-top: -30px; margin-right: 30px; right: 0px; font-family: Lato !important; ">
             <strong>Sort By:</strong>
                 <select onchange="sortBy(value)" class="selectpicker" style="font-family: Lato" name="sortTerm">
                     <option value="artist_lastname" style="font-family: Lato !important;">None</option>
                     <option value="artist_fullname" style="font-family: Lato !important;"<?php echo $sortBy == 'artist_fullname' ? 'selected' : ''; ?>>Artist</option>
                     <option value="artwork" style="font-family: Lato !important;" <?php echo $sortBy == 'artwork' ? 'selected' : ''; ?>>Title</option>
                     <option value="gallery_name" style="font-family: Lato !important;" <?php echo $sortBy == 'gallery_name' ? 'selected' : ''; ?>>Gallery Name</option>
                     <option value="year" style="font-family: Lato !important;" <?php echo $sortBy == 'year' ? 'selected' : ''; ?>>Year</option>
                     <option value="art_fair_year" style="font-family: Lato !important;" <?php echo $sortBy == 'art_fair_year' ? 'selected' : ''; ?>>Art Fair Date</option>
                 </select>
             </div>
         </div>


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
                            <th style="font-size: 12px;">CATEGORY</th>
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
                                        <div>{{$artwork->artist_fullname}}</div>
                                        <a href="{{ url('artwork/'.$artwork->id) }}"><strong style="font-family: Lato; color: black" class="see-details-btn">SEE DETAILS</strong></a>
                                    </td>

                                    <td class="table-text" onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>{{ $artwork->year }}</div>
                                    </td>

                                    <td class="table-text" onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>{{ $artwork->category }}</div>
                                    </td>

                                    <td class="table-text" onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div>{{ $artwork->art_fair }}</div>
                                    </td>  

                                    <td class="table-text" onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                        <div><?php echo date("M Y", strtotime($artwork->art_fair_year)); ?></div>
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

                                    @if (Auth::id() === 1 || Auth::id() === 2 )
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
        <div class="panel panel-default" id="mobile" style="margin-top: 120px;">
         <h1 class="text-center" style="font-size: 40px; font-family: Lato !important; text-transform: uppercase;"> ARTIST INDEX</h1>
         <h4 class="text-center" style="font-size: 20px; font-weight: 300; font-family: Lato !important;"><?php echo count($artworks)?> Results</h4>

        <?php $sortBy = !empty( $_GET['sortBy'] ) ? $_GET['sortBy'] : ''; ?>

        <div class="form-group">
            <div style="position: absolute; margin-top: -30px; margin-right: 30px; right: 0px; font-family: Lato !important; ">
             <strong>Sort By:</strong>
                 <select onchange="sortBy(value)" class="selectpicker" style="font-family: Lato" name="sortTerm">
                     <option value="artist_lastname" style="font-family: Lato !important;">None</option>
                     <option value="artist_fullname" style="font-family: Lato !important;"<?php echo $sortBy == 'artist_fullname' ? 'selected' : ''; ?>>Artist</option>
                     <option value="artwork" style="font-family: Lato !important;" <?php echo $sortBy == 'artwork' ? 'selected' : ''; ?>>Title</option>
                     <option value="gallery_name" style="font-family: Lato !important;" <?php echo $sortBy == 'gallery_name' ? 'selected' : ''; ?>>Gallery Name</option>
                     <option value="year" style="font-family: Lato !important;" <?php echo $sortBy == 'year' ? 'selected' : ''; ?>>Year</option>
                     <option value="art_fair_year" style="font-family: Lato !important;" <?php echo $sortBy == 'art_fair_year' ? 'selected' : ''; ?>>Art Fair Date</option>
                 </select>
             </div>
         </div>
          <hr>
        @foreach ($artworks as $artwork)
        <div class="row row-fluid">
            <div class="media" onclick="window.location='{{url('artwork/'.$artwork->id)}}'">
  

                <div class="clearfix visible-sm"></div>

                <div class="media-body fnt-smaller col-md-8">
                    <a href="#" target="_parent"></a>

                    <h4 class="media-heading">
                      <a href="#" target="_parent">
                          @if (is_null($artwork->artwork)) 
                          Untitled
                          @else 
                          <?php var_dump($artwork->artwork) ?>
                          {{$artwork->artwork}}
                          @endif
                      </a>
                    </h4>

                    <ul class="list-inline mrg-0 btm-mrg-10 clr-535353">
                        <li>{{$artwork->artist_fullname}}</li>

                        <li style="list-style: none">|</li>

                        <li>{{$artwork->year}}</li>

                    </ul>

                    <p class="fnt-smaller fnt-arial">{{$artwork->art_fair}}</p><p class="fnt-smaller fnt-lighter fnt-arial">{{$artwork->gallery_name}}</p>
                    <div class="pull-right">
                        @if (Auth::guest())
                            <a href="{{ url('/login') }}"><button style="margin-top: -20px;" class="btn btn-info">LOG IN TO SEE PRICES</button></a>
                        @else
                            <div>{{ $artwork->price }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- End Listing-->
        <hr>
        @endforeach
        </div>
    @else 

        <div class="panel panel-default" >
        <br>
        <br>
        <br>
        <br>
         <h1 class="text-center" style="font-size: 40px;"> Artist_lastnames Index </h1>

            <div class="panel-body">
            <h5>There are no results for your query. Please try searching something else.</h5>
            </div>
        </div>

    @endif
@endsection