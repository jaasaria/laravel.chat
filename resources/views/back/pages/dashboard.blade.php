@extends('back.layouts.admin')
@section('header-title')
	{{ $pageTitle }}		
@stop
@section('content-title')
	{{ $pageTitle }}		
@stop
@section('content-subtitle')
@stop


@section('content-content')


	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="card card-stats">
			<a href=" {{ url('notifications') }}">
				<div class="card-header" data-background-color="orange">
					<i class="material-icons">content_copy</i>
				</div>
			</a>

			<div class="card-content">
				<p class="category">All Notification</p>

				@if ($count_noti)
					<h3 class="title">{{ $count_noti }}<small> Notification</small></h3>
				@else
					<h3 class="title"><small>No Record Found</small></h3>
				@endif

			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">warning</i> <a href="{{ url('notifications/server') }}">Send Notification...</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="card card-stats">
			<a href=" {{ url('notifications?filter=0') }}">
				<div class="card-header" data-background-color="green">
					<i class="material-icons">store</i>
				</div>			
			</a>
			<div class="card-content">
				<p class="category">Unread Notification</p>
				
				@if ($count_unread)
					<h3 class="title">{{ $count_unread }}<small>Unread</small></h3>
				@else
					<h3 class="title"><small>No Record Found</small></h3>
				@endif


			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">date_range</i> {{ $last_noti }}
				</div>
			</div>
		</div>
	</div>
@stop


@section('content-content-blank')

	<div class="row">
	</div>

@stop




