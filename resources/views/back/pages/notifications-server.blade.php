@extends('back.layouts.admin')
@section('header-title')
	{{ $pageTitle }}		
@stop
@section('content-title')
	{{ $pageTitle }}		
@stop
@section('content-subtitle')
	For Demo: This feature is for admin only. 
@stop

@section('css')
@stop 

@section('content-content')




	<div class="col-md-6 col-md-offset-3">

		@include('closure.errors')

		<form class="form-horizontal" role="form" method="POST" action="{{ url('/notifications/server/') }}">
			
			{{ csrf_field() }}

	
			<div class="form-group label-floating">
				<label class="control-label">Title</label>
				<input type="text" name="title" value="{{ old('title') }}"  class="form-control" required >
			</div>
			<div class="form-group label-floating">
				<label class="control-label">Description</label>
				<textarea class="form-control" name="description" rows="10" required>{{ old('description') }}</textarea>
			</div>
			<div class="checkbox ">
				<label>
				  <input type="checkbox" name="email" {{ old('email') ? 'checked' : '' }} unchecked>
				  With Email? 
				</label>
				<br>
				<small>Please uncheck if error persist. SMPT server may not configure.</small>
			</div>
			<br>

			<div class="col-md-10 col-md-offset-1">
			</div>
			<br><br>

			<a  href=" {{ url()->previous() }}" class="btn btn-default pull-left">Back</a>	
			<button class="btn btn-primary pull-right" type="submit">Send</button>			
			

		</form>

		

	</div>



@stop
