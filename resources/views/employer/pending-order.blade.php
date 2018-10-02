@extends('layouts.employer')

@section('content')
<section>
    <div class="cs-content">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                  <h1>You have a Pending Voucher Order</h1>
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

                    <fieldset><legend>Order</legend>
                        
                        <form method="POST" action="{{url('employer/cancel-order')}}">
                        
                            <input type="hidden" name="order_id" value="{{ $pending_orders->web_order_id }}">
                            <input type="hidden" name="web_order_id" value="{{ $pending_orders->web_order_id }}">
                            <input type="submit" class="btn btn-default" value="Cancel Order">
                        
                        </form>

                        <form method="POST" action="#">
                        
                            <input type="hidden" name="order_id" value="{{ $pending_orders->web_order_id }}">
                            <input type="hidden" name="web_order_id" value="{{ $pending_orders->web_order_id }}">
                            <input type="submit" class="btn btn-default" value="Continue with Order">
                        
                        </form>



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
