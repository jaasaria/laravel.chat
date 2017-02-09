@extends('back.layouts.admin')
@section('header-title')
	{{ $pageTitle }}		
@stop
@section('content-title')
	{{ $pageTitle }}		
@stop
@section('content-subtitle')
@stop

@section('css')

 <style>
 </style>

@stop

@section('content-content')

<div class="col-md-10 col-md-offset-1 ">
  
  <br>
  <h4 class="list-group-item-heading">{{ $noti->data['title'] }}</h4>
  <br>
  <p>{!! $noti->data['description'] !!}</p>   


  <br>

	<div class="col-md-4 col-md-offset-4">
		<a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
	</div>

</div>



@stop


