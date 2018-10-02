<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    @include('parts.global-styles')

    @yield('additional_style')

</head>
<body>

    @include('parts.logo')


    <div class="block dark">
        <div class="jumbotron cs-bg cs-bg-register">
          @include('parts.nav')
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">

                    @yield('squiggle-box')

                    </div>
                </div>
            </div>
           {{--  @include('parts.ripple-svg') --}}
        </div>
    </div>

    @yield('content')

    {{-- @include('parts.content-footer-svg') --}}

    @include('parts.footer')


    @yield('modals')

    @include('parts.global-scripts')

    @yield('additional_script')
</body>
</html>
