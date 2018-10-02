@extends('layouts.food')

@section('page_title')
    {{ $food->name }}
@endsection

@section('squiggle-box')

<div class="row">
    @include('food.search')
</div>

@endsection

@section('content')
<div class="cs-content">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <section>
                    @include('flash::message')
                    <div class="row">
                        <div class="col-md-1">
                            <!-- Favourite Button -->
                            @if($isFavourite == false)
                                <a href="{{url('food/add-favourite/'.$food->id)}}"><i class="fa fa-heart-o fa-3x favourite-heart" aria-hidden="true"></i></a>
                            @else
                                <a href="{{url('food/remove-favourite/'.$food->id)}}"><i class="fa fa-heart fa-3x favourite-heart" style="color: red;" aria-hidden="true"></i></a>
                            @endif
                           <!-- END Favourite Button -->
                        </div>
                        <div class="col-md-11">
                            <h1 class="text-capitalize">{{ $food->name }} by
                                <a class="text-capitalize" href="{{url('profile/'.$food->user->username)}}">
                                    {{$food->user->username}}
                                </a>
                            </h1>
                        </div>


                    </div>



                    @if($my_food)

                    <div class="panel panel-default">
                        <!-- EDIT FOOD MODAL TRIGGER -->
                        <button type="button" class="btn btn-success btn-lg pull-right" data-toggle="modal" data-target="#editFood">
                            EDIT FOOD <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                        <!--Edit Modal -->
                        <div class="modal" id="editFood" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="panel panel-default">
                                        <div class="panel-body">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h3 class="modal-title" id="myModalLabel">Edit {{$food->name}}
                                                </h3>
                                                <hr>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" method="post" action="{{ url('food/edit/'.$food->id) }}" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="portionTitle">Food name</label>
                                                        <input name="name" required="required" type="text" class="form-control" id="portionTitle" aria-describedby="titleHelp" placeholder="Enter food name" value="{{$food->name}}">
                                                        <small id="titleHelp" class="form-text text-muted">A title for your portion eg a cooler of rice.</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Food description</label>
                                                        <textarea name="description" required="required" class="form-control" id="description" rows="3">
                                                            {{$food->description}}
                                                        </textarea>
                                                        <small id="nameHelp" class="form-text text-muted">Give your food detailed but concise description.</small>
                                                    </div>
                                                    <div class="form-group">
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
                                                    <button type="submit" class="btn btn-block btn-primary">Update {{ $food->name }} <i class="fa fa-plus" aria-hidden="true"></i></button>
                                                    <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Close</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--Edit FOOd Modal end -->
                        @endif

                       @if($my_food)
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#addPortion">
                            ADD PORTIONS TO FOOD <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal" id="addPortion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="panel panel-default">
                                        <div class="panel-body">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h3 class="modal-title" id="myModalLabel">Add Portion to food</h3>
                                                <hr>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" method="post" action="{{ url('portion/add/'.$food->id) }}" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="portionTitle">Title of your Portion</label>
                                                        <input name="portionTitle" required="required" type="text" class="form-control" id="portionTitle" aria-describedby="titleHelp" placeholder="Enter portion title">
                                                        <small id="titleHelp" class="form-text text-muted">A title for your portion eg a cooler of rice.</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Portion description</label>
                                                        <textarea name="description" required="required" class="form-control" id="description" rows="3"></textarea>
                                                        <small id="nameHelp" class="form-text text-muted">Give your portion detailed but concise description.</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="portionPrice">Price for your portion in {{ $food->user->country->currency_name }} ({{$food->user->country->currency_symbol}})</label>
                                                        <input name="portionPrice" required="required" type="text" class="form-control" id="portionPrice" aria-describedby="priceHelp" placeholder="Enter portion title">
                                                        <small id="priceHelp" class="form-text text-muted">Price for a unit of your portion.</small>
                                                    </div>
                                                    <div class="form-group">
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
                                                    <button type="submit" class="btn btn-block btn-primary">ADD PORTION TO {{ $food->name }} <i class="fa fa-plus" aria-hidden="true"></i></button>
                                                    <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Close</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                       <!-- Modal End -->
                        @endif
                    </div>

                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-3">
                                    <img class="food-page-image" src="{{url('photos/food/standard_'.$food->photo)}}">
                                    <p>
                                    <!-- Small modal -->
                                    @if($my_food)
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".delete-modal-sm">Delete this food</button>
                                    <div class="modal delete-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">

                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="panel-heading"><h3>Are you sure you want to delete {{$food->name}}?</h3></div>
                                                        <p>Note: All the attached portions will be deleted as well and you will lose points.</p>
                                                        <form method="post" action="{{url('food/delete-food')}}">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="food_id" value="{{$food->id}}">
                                                            <button type="submit" class="btn btn-danger">Yes, Delete!</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">No, Go back!</button>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="fb-share-button" data-href="{{Request::url()}}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a>
                                    </div>


                                    <!--End of Modal -->
                                    </p>
                                </div>
                                <div class="col-sm-3">
                                    <h2>Description</h2>
                                    {{$food->description}}
                                </div>

                                <div class="col-md-3">
                                    <div class="row">
                                        <form method="post" action="{{ url('order/add-order') }}">
                                            {{ csrf_field() }}
                                        <h2>Portions</h2>
                                        <table class="table table-condensed">
                                            <tr>
                                                <th>Name</th>
                                                <th>Price ({{ $food->user->country->currency_symbol }})</th>
                                                <th>Units</th>
                                                @if($my_food)
                                                    <th>Action</th>
                                                @endif
                                            </tr>
                                            @forelse ($portions as $portion)
                                                <tr>
                                                    <td><a href="#" data-toggle="popover" title="Description" data-content="{{ $portion->description }}">{{ $portion->name }}</a></td>
                                                    <td>{{ $food->user->country->currency_symbol }}{{$portion->price }}</td>
                                                    <input type="hidden" required="required" name="portion[]" value="{{ $portion->id }}">
                                                    <td>
                                                        <div class="form-group">
                                                            <input name="unit[]" required="required" type="number" class="form-control food-input" id="unit">
                                                        </div>
                                                    </td>
                                                    @if($my_food)<td>
                                                        <!-- Small modal -->
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-sm_{{$portion->id}}">Delete</button>

                                                        <div class="modal modal-sm_{{$portion->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="panel">
                                                                        <div class="panel-body">
                                                                            <div class="panel-heading"><h3>Are you sure you want to delete {{$portion->name}}?</h3></div>
                                                                            <p>Note: This process cannot be undone after deletion.</p>

                                                                            <a class="btn btn-danger" href="{{url('food/delete-portion/'.$portion->id)}}">Yes, Delete!</a>

                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">No, Go back!</button>



                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    @endif
                                                </tr>
                                            @empty
                                                <tr><th>No portions added yet.</th></tr>
                                            @endforelse

                                        </table>
                                            @if($my_food == false)
                                                @if(count($portions) != 0)
                                                    <button class="btn btn-default btn-block btn-lg" type="submit">ADD TO BASKET <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                                @endif
                                            @endif
                                    </form>
                                    </div>


                                </div>
                                <div class="col-md-3">

                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <i class="fa fa-spoon" aria-hidden="true"></i>
                                            More food by <a href="{{url('profile/'.$food->user->username)}}"><span class="text-capitalize">{{$food->user->username}}</span></a>
                                        </li>
                                        @forelse($more_food as $more)
                                            <li class="list-group-item"><a href="{{url('food/'.$more->slug)}}">{{$more->name}}</a></li>
                                        @empty
                                            <li class="list-group-item">No more food from {{$food->user->username}}</li>
                                        @endforelse

                                    </ul>

                                </div>

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
