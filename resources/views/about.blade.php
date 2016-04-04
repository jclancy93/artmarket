@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 150px;">  
            <h1 class="text-center">ABOUT THIS SITE</h1>
            <br>
            <p style="line-height: 300%;">{{{$page->text}}}</p>
            @if (Auth::id() === 1)
            <a href="{{ url('about/edit') }}"><button style="display: block; margin: 0 auto;" class="btn btn-info">EDIT ABOUT PAGE</button></a>
            @endif
        </div>    
    </div>
</div>
@endsection
