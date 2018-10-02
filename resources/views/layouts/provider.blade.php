<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Provider</title>

    @include('parts.global-styles')


</head>
<body>

    @include('parts.logo')

    <div class="block dark">
        <div class="jumbotron cs-bg cs-bg-provider">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">


                    </div>
                </div>
            </div>
            @include('parts.ripple-svg')
        </div>
    </div>

    @yield('content')

    @include('parts.content-footer-svg')

    @include('parts.footer')

</body>
</html>
