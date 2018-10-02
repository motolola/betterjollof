<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('SITE_NAME')}} -  @yield('page_title')</title>

    <!-- Global Site Tag (gtag.js) - Google Analytics -->

    @include('parts.global-styles')

    @yield('additional_style')

</head>
<body>
@include('parts.logo')

    <div class="block dark">
        <div class="jumbotron cs-bg cs-bg-employer">
          @include('parts.nav-food')
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">

                    @yield('squiggle-box')

                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    @include('parts.footer')

    {{-- Add modal markup here --}}
    <!-- Modal -->
{{--     <div class="modal fade" id="employerHome" tabindex="-1" role="dialog" aria-labelledby="employerHomeLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body text-center">
                <artcle>
                    <h1 id="employerHomeLabel">Modal Title</h1>
                    <p class="lead">Curabitur a felis ac lectus finibus vestibulum. Aenean urna lorem, placerat quis metus at, laoreet iaculis tortor. Donec libero felis, sagittis in egestas quis, venenatis eu turpis.</p>
                </artcle>
          </div>
        </div>
      </div>
    </div> --}}

    @yield('modals')

    @include('parts.global-scripts')

    @yield('additional_script')
</body>
</html>

@section('header_text')
Employer Admin
@endsection
