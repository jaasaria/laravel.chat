@extends('back.layouts.admin')

@section('header-title')
	{{ $pageTitle }}		
@stop
@section('content-title')
	{{ $pageTitle }}		
@stop
@section('content-subtitle')
	View application Events,News and Update
  <div class="pull-right">
    <small> <a href=" {{ url('notifications?filter=0') }}"><i class="fa fa-bell pull-left" style="margin: 5px"></i>Show Unread Notification</a></small>
    
  </div>
  
@stop

@section('css')

 <style>
  .list-photo  .avatar{
    width: 50px;
    height: 50px;
    overflow: hidden;
    border-radius: 50%;
    margin: 0 auto;
    box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
  }
  .list-details {
    margin-left: 70px;
  }  
  .list-group {
    margin-bottom: 10px;
  }
  .bell-red{
    color:red;
  }
  .list-details .bell-red h4{
    color:red;
  }

 </style>

@stop

@section('content-content')

<div class="col-md-10 col-md-offset-1 ">
  

 @foreach ($noti as $value)

    {{-- <div class="list-group">
      <a href=" {{ url('/notifications/info' , $value->id ) }} " class="list-group-item">
        <div class="list-photo pull-left">
          <div class="avatar">
            <img src="/upload/notification.jpg">
          </div>
        </div>
        <div class="list-details">

        
            <div class="{{ $value->stat  == '0' ? 'bell-red':'' }}">
              <i class="fa fa-bell pull-left" style="margin: 5px"></i>
              <h4 class="list-group-item-heading">{{ $value->title }}</h4>
            </div>
            
            <p> {{ $value->description }} </p>              
        </div>
      </a>
    </div> --}}


    <div class="list-group">
      <a href=" " class="list-group-item">
        <div class="list-photo pull-left">
          <div class="avatar">
            <img src="/upload/notification.jpg">
          </div>
        </div>
        <div class="list-details">


              <i class="fa fa-bell pull-left" style="margin: 5px"></i>
              <h4 class="list-group-item-heading">{{ $value->data['title'] }}</h4>

            
            <p> {{ $value->data['description'] }} </p>              
        </div>
      </a>
    </div>



  @endforeach

  {{-- {{ $noti->appends(request()->input())->links()  }} --}}


</div>



@stop


