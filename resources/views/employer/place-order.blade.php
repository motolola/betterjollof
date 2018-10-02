@extends('layouts.employer')

@section('content')
<section>
    <div class="cs-content">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                  <h1>Place your voucher order</h1>
                      @if (session('redirect_message'))
                      <div class="alert alert-success">
                          {{ session('redirect_message') }}
                      </div>
                      @endif

                      @if (session('error_message'))
                      <div class="alert alert-success">
                          {{ session('error_message') }}
                      </div>
                      @endif
                  <hr>

                    <fieldset>
                     <legend>Please choose the type of order from the options below.</legend>
                     @if($order_types->placed == 1)
                     <p class="text-danger">You have already placed a normal order for this payroll period and cannot place another.</p>

                     @endif

                        <form method="POST" action="{{url('employer/place-order')}}"> 
                                                 
                          <div class="form-group">
                            @if($order_types->standard == 1) 
                                <label for="field1" class="radio inline control-label">A normal order for your current payroll period.</label>
                                <input type="radio" class="form-control" {{ ($order_types->placed == 1) ? ' disabled ': '' }} name="order_type" id="field1" value="Standard" placeholder="example">

                            @endif
                            @if ($order_types->manual == 1)
                                <label for="field2" class="radio inline control-label">An additional order by selecting employees.</label>
                                <input type="radio" class="form-control" name="order_type" id="field2" value="Manual" placeholder="example">
                            @endif
                          </div>
                          <div class="form-group text-right">
                            <button role="button" type="submit" class="btn btn-primary">Continue</button>
                          </div>
                        </form>
                        @if ($pending_orders->web_order_id != null)
                        <form method="POST" action="{{url('employer/cancel-order')}}">
                        
                            <input type="hidden" name="order_id" value="{{ $pending_orders->web_order_id }}">
                            <input type="hidden" name="web_order_id" value="{{ $pending_orders->web_order_id }}">
                            <input type="submit" class="btn btn-default" value="Cancel Order">
                        
                        </form>
                        @endif

                    </fieldset>



                </div>
            </div>
        </div>
    </div>
</section>
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
