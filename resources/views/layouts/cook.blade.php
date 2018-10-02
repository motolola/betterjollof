<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('SITE_NAME')}} - @yield('page_title')</title>

    @include('parts.global-styles')

    @yield('additional_style')

</head>
<body>

    @include('parts.logo')
    <div class="block dark">
        <div class="cs-bg cs-bg-parent">
         @include('parts.nav-food')
            @include('food.search')
        </div>
    </div>

    @yield('content')

    @include('parts.footer')


    @yield('modals')

    @include('parts.global-scripts')

    @yield('additional_script')
</body>
</html>
