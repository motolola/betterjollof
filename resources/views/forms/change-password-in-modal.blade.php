<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#changePasswordModal">Change Password</button>
{{-- Password Modal --}}
<div id="changePasswordModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel">
  <div class="modal-dialog ">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="changePasswordModalLabel">Change Password</h2>
      </div>
      <div class="modal-body">    
        <form role="form" method="POST" action="{{ url('user/password-change')}}">
          <div class="form-group">
            <label for="old_password">Old Password</label>
            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password">
          </div>
          <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
          </div>
          <div class="form-group">
            <label for="password_confirm">Confirm New Password</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="New Password">
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
{{-- End Password Modal --}}