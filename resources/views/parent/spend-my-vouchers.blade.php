@extends('layouts.parent')

@section('squiggle-box')
@endsection

@section('content')
<section>
    <div class="cs-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <article>
                        <h1>Spend My Vouchers </h1>
                        <div class="row">
                            <div class="col-md-9">
                                <p>Below are the payments you have arranged for your childcare provider. To set up a new payment click create payment</p>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ url('/parent/my-child-care') }}" class="btn btn-block btn-success"><i class="icon-sodexo-holding-voucher"></i>&nbsp; Create Payment
                                </a>
                            </div>
                        </div>

                    </article>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <h2>Regular Payments</h2>

                    <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                        <thead>
                            <tr>
                                <th>Carer (Reference)</th>
                                <th>Schedule</th>
                                <th>Amount</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>First Payment Date</th>
                                <th>Next Payment Date</th>

                            </tr>
                        </thead>
                        <tbody>

                            @forelse($regular_payments as $payment)
                            <tr>
                                <td>{{ $payment->carer_name or '' }} ({{ $payment->ca_ref or '' }})</td>
                                <td>{{ $payment->schedule_mode or '' }}</td>
                                <td>£{{ $payment->payment_amount or '' }}</td>
                                <td>{{ $payment->carer_address or '' }}</td>
                                <td>{{ $payment->statusdesc or '' }}</td>
                                <td>{{ date('j F Y', strtotime($payment->first_payment_date))}}</td>
                                <td>{{ date('j F Y', strtotime($payment->next_payment_date))}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center"><b>No regular payment to display</b></td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>

               </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <h2>Pending one-off Payments</h2>

                    <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                        <thead>
                            <tr>
                                <th>Carer (Reference)</th>
                                <th>Address</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Payment Date</th>

                            </tr>
                        </thead>
                        <tbody>

                           @forelse($single_payments as $payment)
                            <tr>
                                <td>{{ $payment->carer_name or '' }} ({{ $payment->ca_ref or '' }})</td>
                                <td>{{ $payment->carer_address or '' }}</td>
                                <td>£{{ $payment->payment_amount or '' }}</td>
                                <td>{{ $payment->statusdesc or '' }}</td>
                                <td>{{ date('j F Y', strtotime($payment->payment_date))}}</td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center"><b>No regular payment to display</b></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>


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
