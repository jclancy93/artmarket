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
         <h1 class="text-center" style="font-size: 40px;"> Artworks Index </h1>

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
                                <tr onclick="location.href='{{ url('artwork/'.$artwork->id) }}'">
                                    <!-- Showing all artworks -->
                                    @if ($artwork->image == '')
                                    <td class="table-text table-hover ">
                                        <div>
                                            <h5>{{ $artwork->artwork }}</h5>
                                        </div>
                                    </td>

                                    @else 
                                    <td class="table-text table-hover ">
                                        <div>
                                            <img src="{{ $artwork->image }}" class="thumbnail">
                                            <h5>{{ $artwork->artwork }}</h5>
                                        </div>
                                    </td>
                                    @endif


                                    <td class="table-text">
                                        <div>{{ $artwork->artist }}</div>
                                        <a href="{{ url('artwork/'.$artwork->id) }}"><strong style="font-family: 'Didact Gothic', sans-serif;">SEE DETAILS</strong></a>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $artwork->year }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $artwork->medium }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $artwork->art_fair }}</div>
                                    </td>  

                                    <td class="table-text">
                                        <div>{{ $artwork->art_fair_year }}</div>
                                    </td>  

                                    <td class="table-text">
                                        <div>{{ $artwork->gallery_name }}</div>
                                    </td>                                

                                    @if (Auth::guest())
                                         <td class="table-text">
                                            <a href="{{ url('/login') }}"><button class="btn btn-info">Log in to see Prices</button></a>
                                        </td>

                                    @else
                                        <td class="table-text">
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
         <h1 class="text-center" style="font-size: 40px; letter-spacing: 3px;"><strong>ARTISTS   INDEX</strong> </h1>

            <div class="panel-body">
            <h3 class="text-center">There are no results for your query. Please try searching something else.</h3>
            </div>
        </div>

    @endif
@endsection