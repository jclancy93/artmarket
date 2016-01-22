@extends('layouts.app')

@section('content')
    <!-- Create Task Form... -->

    <!-- Current Tasks -->
    @if (count($artworks) > 0)
        <div class="panel panel-default">
         <h1 class="text-center"> Artworks Index </h1>

            <div class="panel-body">
                <table class="table table-hover">

                    <!-- Table Headings -->
                    <thead>
                        <th>Image</th>
                        <th>Artwork</th>
                        <th>Artist</th>
                        <th>Price</th>
                        <th>Notes</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($artworks as $artwork)
                            <tr>
                                <!-- Showing all artworks -->
                                <td class="table-text table-hover ">
                                    <div>{{ $artwork->image }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $artwork->artist }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $artwork->artwork }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $artwork->price }}</div>
                                </td>

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