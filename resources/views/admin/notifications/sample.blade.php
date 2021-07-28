<?php
  $notifications = DB::table('notifications')
  ->where('notification_status','new')
  ->where('user_id', '=', Auth::guard()->user()->id)
  ->get();
?>
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    <i class="fa fa-envelope-o"></i>
    @if(isset($notifications) && $notifications->count() > 0)
    <span class="badge">{{ $notifications->count() }}</span>
    @endif
</a>

<ul class="dropdown-menu">
  
  @if(isset($notifications) && $notifications->count() > 0)
   <li class="dropdown-header">You Have New Notifications</li>
   
   <li class="notification-list scroll list-group">
      @foreach($notifications as $notification)
      <a href="{{ route('notifications.view', ['notification_id' => $notification->notification_id]) }}" 
        class="notification list-group-item">  
        <div class="message-info-main">
          <span class="message-text">{{ $notification->notification_title }}</span>
          <span class="message-time">{{ $notification->created_at }}</span>
        </div>
      </a>
      @endforeach
   </li>
   

   <li class="dropdown-footer">
    <a href="{{ route('notifications.index') }}">View All</a>
   </li>
   @else
   <li class="dropdown-header">There are no notifications</li>
   @endif
</ul>