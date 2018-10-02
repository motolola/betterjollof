@extends('layouts.food')


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
                        <h2 class="text-capitalize"> Order Basket</h2>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8">

                                        @forelse ($basket as $portion)


                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img class="food-basket-image" src="{{url('photos/food/thumbnail_'.$portion->food->photo)}}">
                                                </div>
                                                <div class="col-md-9">
                                                    <!--Top Row -->
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="lead"> <a href="{{url('food/'.$portion->food->id)}}">{{ $portion->food->name }}</a> - ({{ $portion->name }}) by <a href="{{url('profile/'.$portion->food->user->id)}}">{{ $portion->food->user->username }}</a></div>
                                                        </div>

                                                    </div>
                                                    <!--second row -->
                                                    <div class="row">
                                                        <div class="col-sm-3">Price: {{$portion->food->user->country->currency_symbol}}{{$portion->price}}</div>
                                                        <div class="col-sm-3">Delivery Option</div>
                                                        <div class="col-sm-3 edit-unit">Unit: {{ $portion->unit }} (<a href="#">edit</a>)</div>
                                                        <div class="col-sm-3 unit-edit-form" style="display: none;">
                                                            <form method="post" action="{{url('order/edit-basket')}}">
                                                                {{ csrf_field() }}
                                                                <input type="number" name="bas_unit" value="{{ $portion->unit }}">
                                                                <input type="hidden" name="portion_id" value="{{ $portion->id }}">
                                                                <input type="hidden" name="basket_id" value="{{ $portion->basket_id }}">
                                                                <button type="submit" class="btn btn-sm btn-primary">
                                                                  <i class="fa fa-check" aria-hidden="true"></i>
                                                                </button>
                                                                <button class="btn btn-sm btn-default">
                                                                  <i class="fa fa-times" aria-hidden="true"></i>
                                                                 </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!--third row -->
                                                    <div class="row">

                                                        <div class="col-sm-4">ggggg</div>
                                                        <div class="col-sm-4"><a>favourite</a></div>
                                                        <div class="col-sm-4"><a>Remove</a></div>

                                                    </div>

                                                </div>

                                            </div>
                                        @empty
                                            <p>Basket Empty, Continue shopping to add to basket.</p>
                                        @endforelse
                                    </div>
                                    <div class="col-md-4">
                                        <div class="panel panel-default">
                                                <h2 class="text-capitalize">Additional details</h2>
                                            <div class="panel-body">

                                                <form method="post" action="{{url('order/make-order')}}">

                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="vendor_id" value="{{$basket[0]->food->user->id}}">

                                                    <div class="form-group"> <!-- Message field -->
                                                        <label class="control-label " for="message">Additional Message</label>
                                                        <textarea class="form-control" cols="40" id="message" name="message"></textarea>
                                                    </div>

                                                    <!-- Submit Button -->
                                                    <div class="form-group">
                                                        <button class="btn btn-default btn-block" name="submit" type="submit">Place Order</button>
                                                    </div>

                                                </form>

                                            </div>

                                        </div>


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
    <script>
        $(document).ready(function(){
          $('.edit-unit').click(function(e) {
              e.preventDefault();
              $('.unit-edit-form').toggle();
          });
        });
    </script>
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
