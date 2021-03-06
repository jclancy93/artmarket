@extends('layouts.app')

@section('content')
    <!-- Create Task Form... -->

    <!-- Current Tasks -->
    @if (count($artworks) > 0)
        <div class="panel panel-default"    >
        <br>
        <br>
        <br>
        <br>
         <h1 class="text-center" style="font-size: 40px;"> Artworks Index </h1>

            <div class="panel-body">
                <table class="table table-hover">

                    <!-- Table Headings -->
                    <thead>
                        <th style="font-size: 16px;">Image</th>
                        <th style="font-size: 16px;">Artwork</th>
                        <th style="font-size: 16px;">Artist</th>
                        <th style="font-size: 16px;">Price</th>
                        <th style="font-size: 16px;">Notes</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($artworks as $artwork)
                            <tr>
                                <!-- Showing all artworks -->
                                <td class="table-text table-hover ">
                                    <div><img src="/art_images/{{$artwork->id }}.png" onerror="if (this.src != '/art_images/{{$artwork->id }}.png') this.src = 'img/art_images/image_unavailable.png';"></div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $artwork->artist }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $artwork->artwork }}</div>
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

                                <td class="table-text">
                                    <div>{{ $artwork->notes }}</div>
                                </td>

                                <td>
                                    <!-- TODO: Delete Button -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
@stop