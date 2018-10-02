    <div class="row">

        <div class="col-md-6">
        <form class="form" role="form" method="POST" action="{{url('register')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <section>
                <fieldset><legend>Account Details</legend>
                <div class="row">

                    <div class="col-md-6{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="control-label"><i class="fa fa-user" aria-hidden="true"></i> First Name</label>
                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                            @if ($errors->has('first_name'))
                                <div class="help-block cs-error">{{ $errors->first('first_name') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="control-label"><i class="fa fa-user" aria-hidden="true"></i> Last Name</label>
                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                            @if ($errors->has('last_name'))
                                <div class="help-block cs-error">{{ $errors->first('last_name') }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                    <div class="form-group{{ $errors->has('account_email') ? ' has-error' : '' }}">
                        <label for="account_email" class="control-label"><i class="fa fa-envelope" aria-hidden="true"></i> E-Mail</label>
                        <input id="account_email" type="email" class="form-control" name="account_email" value="{{ old('account_email') }}">
                        @if ($errors->has('account_email'))
                          <div class="help-block cs-error">{{ $errors->first('account_email') }}</div>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('account_password') ? ' has-error' : '' }}">
                        <label for="account_password" class="control-label"><i class="fa fa-key" aria-hidden="true"></i> Account Password</label>
                        <input id="account_password" type="password" class="form-control" name="account_password" value="{{ old('account_password') }}">
                        @if ($errors->has('account_password'))
                          <div class="help-block cs-error">{{ $errors->first('account_password') }}</div>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('account_password_confirmation') ? ' has-error' : '' }}">
                        <label for="account_password_confirmation" class="control-label"><i class="fa fa-key" aria-hidden="true"></i> Confirmation Password</label>
                        <input id="account_password_confirmation" type="password" class="form-control" name="account_password_confirmation" value="{{ old('account_password_confirmation') }}">
                        @if ($errors->has('account_password_confirmation'))
                          <div class="help-block cs-error">{{ $errors->first('account_password_confirmation') }}</div>
                        @endif
                    </div>

                <div class="row">

                <div class="col-md-12">


                    {{-- @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif --}}

                    <div class="form-group text-right">
                        <button class="btn btn-default btn-lg" type="submit">Register</button>
                    </div>

                </div>

    </div>

                </fieldset>
            </section>
            </form>
        </div>
        <div class="col-md-6">

            <fieldset><legend>Register With Your Favourite Social Network</legend>

                    <section>
                        <h2 class="cs">Register With:</h2>
                        <div class="row">
                          <div class="col-md-6">
                                <div class="cs-circle text-center animated flipInY">
                                    <a href="#" title="Register as parent" class="">
                                        <i class="fa fa-facebook-official fa-5x" aria-hidden="true"></i>
                                        Facebook
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cs-circle text-center animated flipInY">
                                    <a href="#" title="Register as employer" class="">
                                        <i class="fa fa-twitter fa-5x" aria-hidden="true"></i>
                                        Twitter
                                    </a>
                                </div>
                            </div>
                        </div>

                    </section>
            </fieldset>
        </div>
    </div>

    

