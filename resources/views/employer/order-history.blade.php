@extends('layouts.employer')

@section('content')
<div class="cs-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <section>
                    <h1>Order History</h1>
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

                    <div class="row">
                        <div class="col-md-3">

                            {{-- Search --}}
                            <form action="#" method="GET">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <label for="search" class="sr-only">Search For</label>
                                    <input id="search" name="search" type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button role="button" class="btn btn-default" type="submit">Go!</button>
                                    </span>
                                </div>
                            </form>

                        </div>
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('employer-place-order') }}" role="button" title="Place an order" class="btn btn-default btn-block">Place Order</a>
                        </div>
                        <div class="col-md-3">                        
                            <a href="#" role="button" title="Export all orders to csv" class="btn btn-default btn-block">CSV Export</a>
                        </div>
                    </div>

                    <hr>

                    <fieldset><legend>Information</legend>
                        <p><b>Next Order Date:</b> {{$next_payroll_date}}</p>
                    </fieldset>                

                    <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                        <thead>
                            <tr>
                                <th colspan="1">Order Number</th>
                                <th colspan="1">Date Submitted</th>
                                <th colspan="1">Delivery Date</th>
                                <th colspan="1">Value</th>
                                <th colspan="1">Status</th>
                                <th colspan="1"></th>
                            </tr>
                        </thead>
                        <tbody>    
                            @forelse($orders as $order)
                            <tr>
                                <td>{{ $order->order_number or '' }}</td>
                                <td>{{ $order->date_submitted or '' }}</td>
                                <td>{{ $order->delivery_date or '' }}</td>
                                <td>£{{ $order->order_value or 0.00 }}</td>
                                <td>{{ $order->status or '' }}</td>
                                <td class="text-right">
                                    <a href="{{ route('employer-order-details') }}" title="More employee information" role="button" class="btn btn-sm btn-default">View</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center"><b>No Order history.</b></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="cs-pagination text-center">
                      
                    </div>

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
