<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Better Jollof -  Registration</title>

    @include('parts.global-styles')

    @yield('additional_style')

</head>
<body>

@include('parts.logo')

<div class="block dark">
    <div class="jumbotron cs-bg cs-bg-login">
        @include('parts.nav')
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">

                    @yield('squiggle-box')
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">Create Account!</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">

                                            <label for="firstname" class="col-md-4 control-label">Firstname</label>

                                            <div class="col-md-6">
                                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                                @if ($errors->has('firstname'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('firstname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                            <label for="surname" class="col-md-4 control-label">Surname</label>

                                            <div class="col-md-6">
                                                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus>

                                                @if ($errors->has('surname'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('surname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label for="username" class="col-md-4 control-label">Username</label>

                                            <div class="col-md-6">
                                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                                @if ($errors->has('username'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('username') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('mobilephone') ? ' has-error' : '' }}">

                                            <label for="mobilephone" class="col-md-4 control-label">Mobile Phone</label>

                                            <div class="col-md-6">
                                                <input id="mobilephone" type="text" class="form-control" name="mobilephone" value="{{ old('mobilephone') }}" required autofocus>

                                                @if ($errors->has('mobilephone'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('mobilephone') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('businessphone') ? ' has-error' : '' }}">

                                            <label for="businessphone" class="col-md-4 control-label">Business Phone</label>

                                            <div class="col-md-6">
                                                <input id="businessphone" type="text" class="form-control" name="businessphone" value="{{ old('businessphone') }}" required autofocus>

                                                @if ($errors->has('businessphone'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('businessphone') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Register
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- @include('parts.ripple-svg') -->
        </div>
    </div>

    @yield('content')

    {{-- @include('parts.content-footer-svg') --}}

    @include('parts.footer')

    {{-- Add modal markup here --}}
    <!-- Modal -->
    <div class="modal fade" id="employerHome" tabindex="-1" role="dialog" aria-labelledby="employerHomeLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-center">
                    <img src="https://unsplash.it/600/200/?random" alt="Introduction modal" class="img-responsive">
                    <artcle>
                        <h1 id="employerHomeLabel">Modal Title</h1>
                        <p class="lead">Curabitur a felis ac lectus finibus vestibulum. Aenean urna lorem, placerat quis metus at, laoreet iaculis tortor. Donec libero felis, sagittis in egestas quis, venenatis eu turpis.</p>
                    </artcle>
                </div>
            </div>
        </div>
    </div>

    @yield('modals')

    @include('parts.global-scripts')

    @yield('additional_script')
</body>
</html>
