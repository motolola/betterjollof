@extends('layouts.cook')
@section('content')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="mainbody container-fluid">
        <div class="row">

            <div style="padding-top:50px;"> </div>
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
                            You earned a total of {{$totalPoints}} points - here is the breakdown</h4>
                        <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                            <tr>
                                <th>Points <i class="fa fa-trophy" aria-hidden="true"></i></th>
                                <th>Comments <i class="fa fa-comment" aria-hidden="true"></i></th>
                                <th>Earned on <i class="fa fa-calendar" aria-hidden="true"></i></th>
                            </tr>

                            @foreach ($points as $point)
                                <tr>
                                    <td>{{ $point->value }}pts</td>
                                    <td>{{ $point->description }}</td>
                                    <td>{{ date('jS F Y', strtotime($point->created_at)) }}</td>
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
