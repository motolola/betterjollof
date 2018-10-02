@if (session()->has('flash_notification.message'))
  <div class="cs-reminder animated bounceInUp" >
    <div class="alert alert-{{ session('flash_notification.level') }} alert-dismissible text-center animated fadeInUp" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div>{!! session('flash_notification.message') !!}</div>
      <hr>
      <div class="text-center">
        <button type="button" class="btn btn-xs btn-{{ session('flash_notification.level') }}" data-dismiss="alert" aria-label="Close">Close</button>
      </div>
    </div>
  </div>
@endif
