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
  <h4 class="list-group-item-heading">{{ $noti->title }}</h4>
  <br>
  <p> {{ $noti->description }} </p>   

</div>



@stop


