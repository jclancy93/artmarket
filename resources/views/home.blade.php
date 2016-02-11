@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-fluid">
        <div class="col-md-10 col-md-offset-1" style="top: 300px;">
        @if (Auth::guest())
            <div class="col-md-10 col-md-offset-1 search-body" style="margin-top: -90px; height: 250px">
                <div class="search">
                    <h2 class="text-center search-text">SEARCH ARTWORKS</h2>
                     <div id="custom-search-input">
                        <div class="input-group col-md-10 col-md-offset-1">
                        <form action="/search" method="GET">
                            <div class="input-group-btn search-panel">
                                <select name="search_param" id="search_param" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <option value="all">Artist Name</option>
                                    <option value="username">Username</option>
                                    <option value="email">Email</option>
                                    <option value="studentcode">Student Code</option>
                                </select>
                            </div>
                            <input type="text" id="query" name="query" class="search-query form-control" placeholder="Search by Artist Name, Fair Name, etc." style="margin-right:20px;" />
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="submit">
                                    <span class=" glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </form>
                                <div class="text-center" style="margin-top: 50px;">
                                    <a href="{{ url('/login') }}">
                                    <button type="submit" class="login-button" style="margin-right: 100px;">
                                        Login
                                    </button>
                                    </a>
                                    <a href="{{ url('/login') }}">
                                    <button type="submit" class="login-button">
                                        SIGN UP
                                    </button>
                                    </a>
                                </div>
        @else
            <div class="col-md-10 col-md-offset-1 search-body" style="margin-top: -90px; height: 150px">
                <div class="search">
                    <h2 class="text-center search-text">SEARCH ARTWORKS</h2>
                     <div id="custom-search-input">
                        <div class="input-group col-md-10 col-md-offset-1">
                        <form action="/search" method="GET">
                            <ul class="dropdown-menu">
                                <li><a href="#">Any</a></li>
                                <li><a href="#">Product Name</a></li>
                                <li><a href="#">Brand</a></li>
                                <li><a href="#">Supplier</a></li>
                                <li><a href="#">Description</a></li>
                            </ul>
                            <input type="text" id="query" name="query" class="search-query form-control" placeholder="Search by Artist Name, Fair Name, etc." />
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="submit">
                                    <span class=" glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </form>
                            @endif
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
