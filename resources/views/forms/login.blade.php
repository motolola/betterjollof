<form class="form text-left" role="form" method="POST" action="{{ url('/login') }}">
  {{ csrf_field() }}

  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="control-label">E-Mail Address</label>
    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">
    @if ($errors->has('email')) <div class="help-block cs-error">{{ $errors->first('email') }}</div> @endif
  </div>

  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="control-label">Password</label>
    <input id="password" type="password" class="form-control" name="password">
    @if ($errors->has('password')) <div class="help-block cs-error">{{ $errors->first('password') }}</div> @endif
  </div>

  <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
    <label for="role" class="control-label">Role</label>
    <select name="role" class="form-control">
      <option>Please select</option>
      <option value="carer">Carer</option>
      <option value="employer">Employer/Client</option>
      <option value="parent">Parent/Beneficiary</option>
    </select>
    @if ($errors->has('role')) <div class="help-block cs-error">{{ $errors->first('role') }}</div> @endif
  </div>


  <div class="row">
    <div class="col-md-6">
      <button type="submit" class="btn btn-default btn-block">
        <i class="fa fa-btn fa-sign-in"></i> Login
      </button>
    </div>
    <div class="col-md-6">
      <a class="btn btn-default btn-block" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
    </div>
  </div>
</form>
{{-- No Longer being used but kept in case we revert --}}
