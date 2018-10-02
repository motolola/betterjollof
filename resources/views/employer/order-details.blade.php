@extends('layouts.employer')
@section('content')
<div class="cs-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section>
                    <h1>Edit Order <small>#{{$pending_orders->web_order_id or ' No Order Number.'}}</small></h1>
                    <fieldset>
                   <legend>All Beneficiaries</legend>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Add</th>
                            </tr>
                        </thead>
                    <tbody>
                    @if(isset($employees))
                    @foreach($employees as $emp)
                        <tr class="active">
                            <td>{{ $emp->first_name." ".$emp->last_name }}</td>
                            <td>&#163;{{ $emp->amount}}</td>
                            <td>
                            <form method="post" action="{{url('employer/add-beneficiary-to-order')}}">
                            <input type="hidden" name="beneficiary_id" value="{{ $emp->id_beneficiary}}">
                            <input type="hidden" name="web_order_id" value="{{$pending_orders->web_order_id}}">
                                <button type="submit" class="btn btn-default">Add</button>
                            </form>
                              
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr><td>No Beneficiary record</td></tr>
                    @endif
                    </tbody>
                  </table>
            </fieldset>

                    
                   <fieldset>
                   <legend>Beneficiaries on Order.</legend>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Payroll Number</th>
                                <th>Name</th>
                                <th>Amout</th>
                                <th>Change</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                    <tbody>
                    @if(isset($beneficiaries_on_order->rows))
                    @foreach($beneficiaries_on_order->rows as $emp)
                        <tr class="active">
                            <td>{{ $emp->payroll_ref}}</td>
                            <td>{{ $emp->first_name." ".$emp->last_name }}</td>
                            <td>&#163;{{ $emp->amount}}</td>
                            <td>{{ $emp->change_status}}</td>
                            <td>
                            <form method="post" action="{{url('employer/remove-beneficiary-on-order')}}">
                            <input type="hidden" name="beneficiary_id" value="{{ $emp->id_beneficiary}}">
                            <input type="hidden" name="web_order_id" value="{{$pending_orders->web_order_id}}">
                                <button type="submit" class="btn btn-default">Remove</button>
                            </form>
                              
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr><td>No Order created yet</td></tr>
                    @endif
                    </tbody>
                  </table>
            </fieldset>
            <div class="row">
            <div class="col-md-6">

            <fieldset><legend>Order Total</legend>

                    <table class="table">

                     <tr class="active"><th>Number of Employees on this order</th><td>{{ $beneficiaries_on_order->total_bens or ''}}</td></tr>
                     <tr class="active"><th>Total Order Value</th><td>&#163;{{ $beneficiaries_on_order->total_out_fv or '' }}</td></tr>
                     <tr class="active"><th>Salary Sacrifice Amount</th><td>&#163;{{ $beneficiaries_on_order->total_mfee or '' }}</td></tr>
                     <tr class="active"><th>Gifting Amount</th><td>&#163;{{ $beneficiaries_on_order->total_gift_fv or ''}}</td></tr>

                    </table>

            </fieldset>
            </div>
            <div class="col-md-6"> </div>
            </div>
                   <div class="row">
                   <form method="POST" action="{{url('employer/submit-order')}}">

                   <a class="btn btn-lg btn-default" href="{{url('employer/order-history')}}">Cancel</a>
                   <a class="btn btn-lg btn-success" href="{{url('employer/order-confirm')}}">Continue</a>

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
