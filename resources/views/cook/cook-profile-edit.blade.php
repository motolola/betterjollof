@extends('layouts.cook')
@if (session('redirect_message'))
    <div class="alert alert-success">
        {{ session('redirect_message') }}
    </div>
@endif

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
                            <div align="center">
                                <a href="{{url('profile')}}">
                                    <button class="btn btn-block btn-default btn-sm"><strong>BACK TO PROFILE <i class="fa fa-user" aria-hidden="true"></i></strong></button>
                                </a>
                                <img class="thumbnail img-responsive" src="{{url('photos/user/standard_'.$user->avatar)}}" width="300px" height="300px">
                            </div>
                        <form class="form-inline" method="post" action="{{url('profile-picture')}}" id="picture_upload" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="profilePicture">Change profile picture</label>
                                <input type="file" name="profile_picture" class="form-control-file" id="profilePicture" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">This can be your profile picture or business logo.</small>
                                @if ($errors->has('profile_picture'))
                                    <span class="help-block">
                                                      <strong>{{ $errors->first('profile_picture') }}</strong>
                                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-block btn-primary"><strong>UPDATE PICTURE</strong></button>
                            <p id="upload_response"></p>
                        </form>

                        <div class="media-body">
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        @include('flash::message')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <i class="fa fa-2x fa-hand-paper-o pull-right" aria-hidden="true"></i>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{url('profile-edit')}}">
                            {{ csrf_field() }}
                        <div class="form-inline">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0{{ $errors->has('username') ? ' has-error' : '' }}">
                                <div class="input-group-addon"><strong>username</strong> <i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                <input type="text" name="username" class="form-control" id="inlineFormInputGroup" value="{{ ($user->username) }}" placeholder="Username">
                            </div>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-group-addon"><strong>Email</strong> <i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                <input type="email" name="email" class="form-control" id="inlineFormInputGroup" value="{{ ($user->email) }}" placeholder="Email">
                            </div>

                        </div>
                        <div class="form-inline">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <div class="input-group-addon"><strong>Firstname</strong> <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                </div>
                                <input type="text" name="firstname" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" value="{{ ($user->firstname) }}" placeholder="First name">
                            </div>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0{{ $errors->has('surname') ? ' has-error' : '' }}">
                                <div class="input-group-addon"><strong>Surname</strong> <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                </div>
                                <input type="text" name="surname" class="form-control" id="inlineFormInputGroup" value="{{ ($user->surname) }}" placeholder="Surname">
                            </div>
                        </div>
                       <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0{{ $errors->has('mobilephone') ? ' has-error' : '' }}">
                                    <div class="input-group-addon"><strong>Mobile phone</strong> <i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                    <input type="mobilephone" name="mobilephone" class="form-control" id="inlineFormInputGroup" value="{{ ($user->mobilephone) }}" placeholder="Mobile phone">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0{{ $errors->has('businessphone') ? ' has-error' : '' }}">
                                    <div class="input-group-addon"><strong>Business phone</strong> <i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                    <input type="businessphone" name="businessphone" class="form-control" id="inlineFormInputGroup" value="{{ ($user->businessphone) }}" placeholder="Email">
                                </div>
                            </div>

                            <hr>


                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group{{ $errors->has('about_user') ? ' has-error' : '' }}">
                                    <label for="exampleTextarea">Summary</label>
                                    @if ($errors->has('about_user'))
                                        <span class="help-block">
                                                      <strong>{{ $errors->first('about_user') }}</strong>
                                                    </span>
                                    @endif
                                    <textarea name="about_user" class="form-control" id="exampleTextarea" rows="3">{{$user->about}}</textarea>
                                    <small id="AboutHelp" class="form-text text-muted">Give concise summary of what you do, eg, catering, event planning etc</small>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group{{ $errors->has('user_specialities') ? ' has-error' : '' }}">
                                    <label for="exampleTextarea">Your specialties</label>
                                    @if ($errors->has('user_specialities'))
                                        <span class="help-block">
                                                      <strong>{{ $errors->first('user_specialities') }}</strong>
                                                    </span>
                                    @endif
                                    <textarea name="user_specialities" class="form-control" id="exampleTextarea" rows="3">{{$user->specialities}}</textarea>
                                    <small id="SpecialityHelp" class="form-text text-muted">List your specialties, separate each one by a comma</small>
                                </div>
                            </div>
                            <div class="col-sm-2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                    <label for="exampleTextarea">Country</label>
                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                                      <strong>{{ $errors->first('country') }}</strong>
                                                    </span>
                                    @endif
                                    <select class="form-control" name="country" id="country_list">
                                        <option value="">Please select country</option>
                                        @foreach($countries as $country)
                                            <option @if($user->country_id == $country->id) selected @endif value="{{$country->id}}">{{$country->name}} ({{$country->code}})</option>
                                        @endforeach
                                    </select>
                                    <small id="CountryHelp" class="form-text text-muted">Select your country to help potential customer search for you.</small>

                                </div>
                                <hr>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                                    <label for="exampleTextarea">State/Region</label>
                                    @if ($errors->has('region'))
                                        <span class="help-block">
                                                      <strong>{{ $errors->first('region') }}</strong>
                                                    </span>
                                    @endif
                                    <select class="form-control" name="region" id="region_list">
                                        <option value="{{$user->region->id or ''}}" >{{$user->region->name or ''}}</option>
                                    </select>
                                    <small id="RegionHelp" class="form-text text-muted">Select your country to help potential customer search for you.</small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                    <label for="cityText">City</label>
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                                      <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                    @endif
                                    <select class="form-control" name="city" id="city_list">
                                        <option value="{{$user->city->id or ''}}" >{{$user->city->name or ''}}</option>
                                    </select>
                                    <small id="CityHelp" class="form-text text-muted">Select your country to help potential customer search for you.</small>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <button class="btn btn-primary btn-lg btn-block">
                                <strong>UPDATE YOUR PROFILE <i class="fa fa-pencil-square-o" aria-hidden="true"></i></strong>
                            </button>
                        </div>
                        </form>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $("#country_list").on('change', function(){
                var id = $("select#country_list option:selected").attr('value');
                $.post("{{url('regionsFilter')}}",
                        {id:id},
                        function(data){
                            $("select#region_list").html(data);
                            console.log(data);
                        });
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#region_list").on('change', function(){
                var id = $("select#region_list option:selected").attr('value');
                $.post("{{url('citiesFilter')}}",
                        {id:id},
                        function(data){
                            $("select#city_list").html(data);
                        });
            });
        })
    </script>

@endsection

@section('modals')
    {{-- Add modal markup here --}}
@endsection
