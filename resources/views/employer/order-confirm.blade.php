@extends('layouts.employer')
@section('content')
<div class="cs-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section>
                    <h1>Order Confirmation <small>Order ID #{{ $pending_orders->web_order_id }}</small></h1>
                    <form class="form-horizontal" method="POST" action="{{ url('employer/submit-order')}}">
                       <fieldset>

                       <legend>Confirm Your Delivery Details.</legend>
                       <input type="hidden" name="web_order_id" value="{{ $pending_orders->web_order_id}}">

                              <div class="form-group{{ $errors->has('reference') ? ' has-error' : '' }}">
                                <label for="inputEmail3" class="col-sm-4 control-label">Order Reference</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="inputReference" name="reference" placeholder="" value="{{ old('reference') }}">
                                </div>
                              </div>
                              <div class="form-group{{ $errors->has('fee_reference') ? ' has-error' : '' }}">
                                <label for="inputPassword3" class="col-sm-4 control-label">Management fee reference</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="inputPassword3" name="fee_reference" placeholder="" value="{{ old('fee_reference') }}">
                                </div>
                              </div>
                              <div class="form-group{{ $errors->has('supplied_date') ? ' has-error' : '' }}">
                                <label for="inputPassword3" class="col-sm-4 control-label"><input type="radio" checked name="date"> On a specific date</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="inputPassword3" placeholder="" name="supplied_date" value="{{ old('supplied_date') }}">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label"><input type="radio" name="date"> As soon as possible</label>
                                <div class="col-sm-8">

                                </div>
                              </div>


                       </fieldset>

                       <fieldset><legend>Confirm Your Order Total</legend>

                        <table class="table">
                           <tr class="active"><th>Number of Employees on this order</th><td>{{ $beneficiaries_on_order->total_bens}}</td></tr>
                           <tr class="active"><th>Total Order Value</th><td>&#163;{{ $beneficiaries_on_order->total_out_fv }}</td></tr>
                           <tr class="active"><th>Salary Sacrifice Amount</th><td>&#163;{{ $beneficiaries_on_order->total_mfee }}</td></tr>
                           <tr class="active"><th>Gifting Amount</th><td>&#163;{{ $beneficiaries_on_order->total_gift_fv}}</td></tr>
                    </table>

                       </fieldset>

                       <div class="row">

                       <a class="btn btn-lg btn-default" href={{url('employer/order-history')}}>Cancel</a>
                       <a class="btn btn-lg btn-primary" href="{{url('employer/order-details')}}">Edit</a>
                       <button class="btn btn-lg btn-success">Submit Order</button>

                       </div>
                   </form>

        </section>
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
