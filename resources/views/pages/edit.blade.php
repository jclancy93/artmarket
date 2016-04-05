@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="top: 125px;">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
 			<form class="form-horizontal"  method="POST" role="form" action="/about/edit" enctype="multipart/form-data">
        <fieldset>
        	{{ method_field('POST') }}
        	{!! csrf_field() !!}
          <!-- Form Name -->
          <legend class="text-center">Edit Page Text</legend>
          <div class="col-md-6">
          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Page Text</label>
            <div class="col-sm-10">
            <textarea class="form-control" rows="8" value="{{$page->text}}"  name="text"></textarea>
            </div>
          </div>
         </div>

         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
              <br>
                <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </fieldset>
      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
