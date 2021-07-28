@extends('layouts.sitelayout')

@section('content')


<div class="sec_content">
  
  <div class="page-title-box">
      <h4 class="page-title">Notifications</h4>
        
      <ol class="breadcrumb">
          <li class="active">
            <a href="">Dashboard </a>
          </li>

          <li>
            <a href="">Notifications </a>
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>


  <div class="row">
      <div class="col-md-12">
          
          <div class="white-box">
            <div class="row">
              
              @if(isset($notifications) && $notifications->count() > 0)
              <div class="col-md-12">
                
                @foreach($notifications as $notification)
                
                <div class="wide_cont_box">
                  <h5>{{ $notification->notification_title }}</h5>
                  <p>{!! $notification->notification_content !!}</p>
                  <p>Created: {{ date("F j, Y", strtotime($notification->created_at)) }}</p>

                  <div class="tag">{{ $notification->notification_status }}</div>
                </div>
                
                @endforeach

              </div>
              @else 
              <div class="col-md-12"><p>There are no notifications</p></div>
              @endif
            </div>
          </div>

      </div>

  </div>

</div>

@endsection
