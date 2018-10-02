@extends('layouts.food')


@section('squiggle-box')

    <div class="row">
        @include('food.search')
    </div>

@endsection

@section('content')

    <div class="cs-content">
        <div class="container">
            <div class="row" ng-app="myApp" ng-controller="MainController">

                <div class="col-md-12">
                   <h1>Angular Page + Blade Prove of Concept @{{me}}</h1>

                    <table class="table">
                        <tr>
                            <th>Firname</th>
                            <th>Surname</th>
                            <th>Username</th>
                            <th></th>
                        </tr>
                        <tr ng-repeat="x in users">
                            <td>@{{x.firstname}}</td>
                            <td>@{{x.surname}}</td>
                            <td>@{{x.username}}</td>
                            <td ng-click="deleteUser()">delete</td>

                        </tr>

                    </table>


                </div>

                <div class="col-md-12">


                </div>

            </div>
        </div>
    </div>

@endsection

@section('additional_style')
    {{-- Add custom stylesheet links here --}}
@endsection

@section('additional_script')
    {{-- Add custom javascript links here --}}

    {{-- Add angular links here --}}
    <script src="{{ URL::asset('js/angular/app.js') }}"></script>
    <script src="{{ URL::asset('js/angular/controllers/MainController.js') }}"></script>
    <script src="{{ URL::asset('js/angular/services/UserService.js') }}"></script>



@endsection

@section('modals')
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        $('#flash-overlay-modal').modal();
    </script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
        });
    </script>
    {{-- Add modal markup here --}}
@endsection
