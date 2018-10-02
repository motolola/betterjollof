@extends('layouts.cook')



@section('content')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
    <div class="mainbody container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Earned badges.</h4>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>
                            Followers list
                        </h4>
                        <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                            <tr>
                                <th>Username <i class="fa fa-trophy" aria-hidden="true"></i></th>
                                <th>Name <i class="fa fa-user" aria-hidden="true"></i></th>
                            </tr>
                            @foreach($followers as $follower)
                                <tr>
                                    <td class="text-capitalize"><a href="{{url('profile/'.$follower->username)}}">{{$follower->username}}</a></td>
                                    <td class="text-capitalize">{{$follower->firstname." ".$follower->surname}}</td>
                                </tr>
                            @endforeach

                        </table>


                    </div>
                </div>
                <hr>

            </div>
        </div>
    </div>


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
