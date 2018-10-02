@extends('layouts.parent')
 @if (session('redirect_message'))
          <div class="alert alert-success">
               {{ session('redirect_message') }}
           </div>
 @endif

@section('squiggle-box')
@endsection

@section('content')
<section>
    <div class="cs-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <article>
                        <h1>My Voucher Payroll Deductions </h1>
                        <p class="lead">My Paroll Number : <strong>{{ $payroll_number or 'UNKNOWN'}}</strong></p>
                        <p>
                            Select the payroll date from which you wish your deduction to take effect.
                        </p>
                        <p>
                            Please note that any changes you request will not take place until they are approved by your employer.
                        </p>
                        <p>
                            Please remember that your Childcare Vouchers will expire 30 months after they are added to your account. You can however request for expired vouchers to be re-issued by calling the Customer Care helpline.
                        </p>
                    </article>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">

                          @if($vouchers)
                          <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                              <thead>
                                  <tr>
                                      <th >Payroll Date</th>
                                      <th >Current Amount</th>
                                      <th >Requested Amount</th>
                                      <th >Voucher Type</th>
                                      <th >Event Type</th>
                                      <th colspan="2">Reason for Change</th>
                                  </tr>
                              </thead>
                              <tbody>
                          @foreach($vouchers as $voucher)
                          <tr>
                            <td>{{ $voucher->formatted_effective_date}}</td>
                            <td>&pound;{{ $voucher->amount  }}</td>
                            <td>&pound;{{ $voucher->amount_requested}}</td>
                            <td>{{ $voucher->requested_type}}</td>
                            <td>{{ $voucher->change_type}}</td>
                            <td>{{ $voucher->life_changing_event}}</td>
                            <td class="text-right">
                              <a href="{{ url('/parent/agreement/'.$voucher->effective_date) }}" title="edit information" role="button" class="btn btn-sm btn-success">Change</a>
                            </td>
                          </tr>
                          @endforeach
                            </tbody>
                        </table>
                        @else
                          <div class="alert alert-info">
                            No Vouchers Found
                          </div>
                        @endif

                </div>
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
