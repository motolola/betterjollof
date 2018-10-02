<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Better Jollof -  home</title>

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
                            <div class="col-xs-6">
                                <div class="well well-lg">
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                                            <div class="col-md-6 col-md-offset-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Login
                                                </button>

                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    Forgot Your Password?
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="well well-lg">
                                <p class="lead">Register now for <span class="text-success">FREE</span></p>
                                <ul class="list-unstyled" style="line-height: 2">
                                    <li><span class="fa fa-check text-success"></span> See all your orders</li>
                                    <li><span class="fa fa-check text-success"></span> Fast re-order</li>
                                    <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                                    <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                                    <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                                    <li><a href="/read-more/"><u>Read more</u></a></li>
                                </ul>
                                <p><a href="/new-customer/" class="btn btn-primary btn-block"><strong>CREATE AN ACCOUNT!</strong></a></p>
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
