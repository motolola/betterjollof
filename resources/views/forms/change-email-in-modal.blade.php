<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#changeEmailModal">Change Email</button>
{{-- Email Modal --}}
<div id="changeEmailModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="changeEmailModalLabel">
  <div class="modal-dialog ">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="changeEmailModalLabel">Change Email</h2>                                
      </div>
      <div class="modal-body">    
        <p><b>Current: {{ $user->email or 'employer@domain.com' }}</b></p>
        <form role="form" method="POST" action="#">
          <div class="form-group">
            <label for="new_email">New Email</label>
            <input type="password" class="form-control" id="new_email" name="new_email" placeholder="New Email">
          </div>
          <div class="form-group text-right">
            <button role="button" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button role="button" type="submit" class="btn btn-success">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- End Email Modal --}}