@extends('layouts.food')
@section('content')

    <div class="cs-content">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <section>
                        <h1>Add Food</h1>
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

                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form class="form-horizontal" method="post" action="{{url('food/add')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group{{ $errors->has('foodName') ? ' has-error' : '' }}">
                                                @if ($errors->has('foodName'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('foodName') }}</strong>
                                                    </span>
                                                @endif

                                                <label for="foodName">Name of food</label>
                                                <input name="foodName" type="text" class="form-control" id="foodName" value="{{ old('foodName') }}" aria-describedby="nameHelp" placeholder="Enter food name">
                                                <small id="nameHelp" class="form-text text-muted">The name of your food, eg, Jollof Rice, Pounded Yam.</small>
                                            </div>
                                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                                <label for="description">Food description</label>
                                                <textarea name="description" class="form-control" id="description" rows="3">{{ old('description') }}</textarea>
                                                <small id="nameHelp" class="form-text text-muted">Give your food detailed but concise description.</small>
                                            </div>
                                            <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">

                                                @if ($errors->has('picture'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('picture') }}</strong>
                                                    </span>
                                                @endif
                                                <label for="exampleInputFile">File input</label>
                                                <input name="picture" type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                                                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                    Agree to <a href="#">Terms & Conditions</a>
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-block btn-primary">ADD FOOD TO RECORD <i class="fa fa-plus" aria-hidden="true"></i></button>
                                            <a href="{{url('profile')}}" class="btn btn-block btn-default">CANCEL</a>
                                        </form>

                                    </div>
                                </div>
                            </div>
                    </section>
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
@endsection

@section('modals')
    {{-- Add modal markup here --}}
@endsection