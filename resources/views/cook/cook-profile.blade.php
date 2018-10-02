@extends('layouts.cook')

@section('page_title')
{{$user->firstname." ".$user->surname}}
@endsection

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="mainbody container-fluid">
        <div class="cs-content">
           <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="media">

                            <div align="center">
                                <img class="img-responsive user-page-image" src="{{url('photos/user/standard_'.$user->avatar)}}" width="300px" height="300px">
                            </div>

                            <!-- Edit my profile link -->
                            @if ($my_page)
                            <a href="{{url('/profile-edit')}}">
                                <button class="btn btn-default btn-block">
                                    <strong>EDIT PROFILE <i class="fa fa-pencil-square-o" aria-hidden="true"></i></strong>
                                </button>
                            </a>
                            @endif

                                    <!-- Follow Button -->
                            @if (!$my_page)
                            <div>
                                @if($follows)
                                    <form method="post" action="{{url('user/unfollow/'.$user->id)}}">
                                        {{ csrf_field() }}
                                            <button type="submit" class="btn btn-block btn-default btn-following"><i class="fa fa-user-plus" aria-hidden="true"></i></button>

                                    </form>

                                @else
                                <form method="post" action="{{url('user/follow/'.$user->id)}}">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> <strong>Follow Me</strong></button>

                                </form>
                                @endif
                            </div>
                            @endif

                            <div class="media-body">
                                <hr>
                                <h3><strong>About</strong></h3>
                                <p>{{$user->about}}</p>
                                <hr>
                                <h3><strong>Specialities</strong></h3>
                                <p class="text-uppercase">{{$user->specialities or "" }}</p>
                                <h3><strong>Location</strong></h3>
                                <p>{{$user->city->name or ""}} {{$user->region->name or ""}} {{$user->country->name or "Country not set"}}</p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('flash::message')
                    <span>
                        <h1 class="panel-title pull-left" style="font-size:30px;">
                            {{ ($user->firstname) }} {{ ($user->surname) }} <small>{{ ($user->email) }}</small> <i class="fa fa-check text-success" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="John Doe is sharing with you"></i>
                            <a href="{{url('user/points')}}">{{ $user_status->point }} <i class="fa fa-certificate" aria-hidden="true"></i></a>
                        </h1>
                        <div class="pull-right">
                            <a class="btn btn-default" href="{{url('food/add')}}" type="button" id="dropdownMenu1">
                                <strong>Add Food</strong> <i class="fa fa-fw fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </span>
                        <br><br>
                        <i class="fa fa-tags" aria-hidden="true"></i> <a href="/tags/diaspora" class="tag">#diaspora</a> <a href="/tags/hashtag" class="tag">#hashtag</a> <a href="/tags/caturday" class="tag">#caturday</a>
                        <br>
                    <span class="pull-left">
                        <a href="#" class="btn btn-link" style="text-decoration:none;">
                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                            Food posted <span class="badge">{{ $food->total() }}</span>
                        </a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;">
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            Rank <span class="badge">{{$user_status->rank}}</span>
                        </a>
                        <a href="{{url('followers/'.$user->username)}}" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-users" aria-hidden="true"></i> Followers <span class="badge">{{ $number_of_followers }}</span></a>
                    </span>
                    <span class="pull-right">
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-at" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Mention"></i></a>
                            <!-- Button trigger modal -->
                            <a href="#" class="" data-toggle="modal" data-target="#contactSeller">
                                <i class="fa fa-lg fa-envelope-o" aria-hidden="true"></i> Contact Vendor
                            </a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-ban" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Ignore"></i></a>
                    </span>

                        <!-- Modal -->
                        <div class="modal" id="contactSeller" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title text-uppercase" id="myModalLabel">Send message to {{$user->username}}</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form method="post" action="{{url('message/send-message')}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="to_id" value="{{$user->id}}">
                                            <input type="hidden" name="username" value="{{$user->username}}">
                                            <div class="form-group">
                                                <label for="msg_subject" class="control-label">Subject:</label>
                                                <input type="text" required="required" class="form-control" name="msg_subject" id="msg_subject">
                                            </div>
                                            <div class="form-group">
                                                <label for="msg_body" class="control-label">Message:</label>
                                                <textarea name="msg_body" required="required" class="form-control" id="msg_body"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-primary">Send</button>
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                 @include('food.food-list-table')
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
@endsection

@section('modals')
    {{-- Add modal markup here --}}
@endsection
