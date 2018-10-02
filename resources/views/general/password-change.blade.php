@extends('layouts.app')

@section('content')
<section>
    <div class="cs-content">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                  <h2>Please enter your username and email address so that we can send you a link to reset your password.</h2>
                  <hr>

                    <fieldset><legend>Request a password reset</legend>
                    <form class="form" role="form" method="POST" action="{{ url('user/password-change') }}">
				    {{ csrf_field() }}
				    <input type="hidden" name="username" value="{{$user_data->username }}">

					    <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
					        <label for="username" class="control-label">Username: {{$user_data->username }}</label>
					    </div>

					    <div class="form-group {{ $errors->has('existing_password') ? ' has-error' : '' }}">
					        <label for="existing_password" class="control-label">Existing password</label>
					        <input id="existing_password" type="password" class="form-control" name="existing_password" value="{{ old('existing_password') }}">
					    </div>
					     <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
					        <label for="password" class="control-label">New password</label>
					        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
					    </div>
					     <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
					        <label for="password_confirmation" class="control-label">Confirm new password</label>
					        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
					    </div>
					        <div class="row">
						        <div class="col-md-6">
						            <button type="submit" class="btn btn-default btn-block">
						                <i class="fa fa-btn fa-sign-in"></i> Submit
						            </button>                                
						        </div>
						        <div class="col-md-6">
						        	<a class="btn btn-default btn-block" href="{{ url('/') }}">Cancel</a>
						        </div>
						    </div>
				    </form>



                    </fieldset>



                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('additional_style')
{{-- Add custom stylesheet links here --}}
@endsection

@section('additional_script')
{{-- Add custom javascript links here --}}
@endsection

@section('modals')
{{-- Add modal markup here --}}
@endsection