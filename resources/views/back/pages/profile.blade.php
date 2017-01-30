@extends('back.layouts.admin')
@section('header-title')
	{{ $pageTitle }}		
@stop
@section('content-title')
	{{ $pageTitle }}		
@stop
@section('content-subtitle')
	Complete your information details
@stop
@section('css')
	<style>
		.card-profile{
				margin-top: 50px;
		}
	</style>
@stop


@section('content-content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">


	<div class="card card-profile">
		<div class="card-avatar">
			<a href="">
				<img class="img" src="/assets/img/faces/avatar.jpg" />
			</a>
		</div>
		<div class="content">
			<h6 class="category text-gray">CEO / Co-Founder</h6>
			<h4 class="card-title"> {{ auth::user()->name }} </h4>
			<a href="" class="btn btn-primary btn-round">Change Avatar</a>
		</div>
	</div>


	<div class="form-group label-floating">
		<label class="control-label">First Name</label>
		<input type="text" class="form-control" >
	</div>

	<div class="form-group label-floating">
		<label class="control-label">Middle Name</label>
		<input type="text" class="form-control" >
	</div>

	<div class="form-group label-floating">
		<label class="control-label">Last Name</label>
		<input type="text" class="form-control" >
	</div>

	<div class="form-group label-floating">
		<label class="control-label">Job</label>
		<input type="text" class="form-control" >
	</div>

	<div class="form-group label-floating">
		<label class="control-label">About Me</label>
		<textarea class="form-control" rows="3"></textarea>
	</div>

<div class="col-md-8 col-md-offset-2">
	<button type="submit" class="btn btn-primary btn-block"> Update</button>
</div>


	</div>
</div>


@stop


