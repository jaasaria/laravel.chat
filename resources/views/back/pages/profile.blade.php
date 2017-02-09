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

	@include('closure.errors')


	<div class="card card-profile">
		<div class="card-avatar">
				<img  id="uploadPreview" class="img" src="{{ '/upload/avatars/' . $data->avatar }}"/>
		</div>
		<div class="content">
				<h6 class="category text-gray"> {{ $data->job }} </h6>
				<h4 class="card-title"> {{ auth::user()->fullname }} </h4>
		</div>
	</div>


	<form method="POST" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">

	  	{{ csrf_field() }}

		<div class=" text-center">
			<button type="button" class="btn btn-primary btn-round" 
					onclick="document.getElementById('uploadImage').click()">
		        	<i class="fa fa-user "></i> Change Avatar
		    </button>
			<br>
			<small>Requirements: 160x160px, Max: 3MB File</small>
			<input  class=" hidden btn btn-primary btn-round" type="file"  id="uploadImage" name="avatar" accept="image/*" onchange="PreviewImage();">		
			<hr>
		</div>
			
		<div class="form-group label-floating">
			<label class="control-label">First Name</label>
			<input name="name" type="text" class="form-control"
			value="{{ (empty($data)?  old('name'): old('name', $data->name)) }}" required autofocus>
		</div>

		<div class="form-group label-floating">
			<label class="control-label">Middle Name</label>
			<input name="middlename" type="text" class="form-control" 
			value="{{ (empty($data)?  old('middlename'): old('middlename', $data->middlename)) }}" required>
		</div>

		<div class="form-group label-floating">
			<label class="control-label">Last Name</label>
			<input name="lastname" type="text" class="form-control" 
			value="{{ (empty($data)?  old('lastname'): old('lastname', $data->lastname)) }}" required>
		</div>

		<div class="form-group label-floating">
			<label class="control-label">Job</label>
			<input name="job" 	type="text" class="form-control" 
			value="{{ (empty($data)?  old('job'): old('job', $data->job)) }}">
		</div>

		<div class="form-group label-floating">
			<label class="control-label">About Me</label>
			<textarea name="about" class="form-control" rows="3">{{ (empty($data)?  old('about'): old('about', $data->about)) }}</textarea>
		</div>

		<div class="col-md-8 col-md-offset-2">
			<button type="submit" class="btn btn-primary btn-block"> Update</button>
		</div>

	</form>



	</div>
</div>


@stop



@section('js')

<script>

	 	function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>
@stop
