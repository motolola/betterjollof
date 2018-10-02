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
            <h1>Make a Regular Payment</h1>

            <p>If you would like to set up a regular payment to this childcare provider, simply fill in the payment details below and click create. The first payment date refers to the date the payment process starts. This starts the same day (providing payment is made before 2pm). Payments made after 2pm will be processed the following day. Payments can take up to four working days to clear in a bank account.</p>
            <p>All fields are mandatory.</p>

            <h2>My Childcare Provider Details</h2>

            <strong>Childcare Provider ID :</strong>
            {{ $carer_id}}
            <br>


            <strong>Childcare Provider Name :</strong>
            {{ $carer->name}}
            <br>


            <strong>Address :</strong>
            {{ $carer->address1." ".$carer->address2.", ".$carer->post_code}}
            <br>
            <hr>

            <div class="row">
              <div class="col-md-12">
                <form class="form" role="form" method="POST" action="{{url('parent/payment-standing-order')}}">
                  <section>
                    <fieldset><legend>Regular Payment Details</legend>
                    <input type="hidden" name="carer_id" value="{{ $carer_id }}">
                    <input type="hidden" name="currency" value="{{ $carer->currency}}">

                      <div class="form-group{{ $errors->has('reference') ? ' has-error' : '' }}">
                        <label for="reference" class="control-label">Your Reference</label>
                        <input id="reference" type="text" class="form-control" name="reference" placeholder="" value="{{ old('reference') }}">
                        @if ($errors->has('reference')) <div class="help-block cs-error">{{ $errors->first('reference') }}</div> @endif
                      </div>

                      <div class="form-group{{ $errors->has('payment_amount') ? ' has-error' : '' }}">
                        <label for="payment_amount" class="control-label">Amount to pay (&pound;)</label>
                        <input id="payment_amount" type="text" class="form-control" name="payment_amount" value="{{ old('payment_amount') }}">
                        @if ($errors->has('payment_amount')) <div class="help-block cs-error">{{ $errors->first('payment_amount') }}</div> @endif
                      </div>

                      <div class="form-group{{ $errors->has('payment_date') ? ' has-error' : '' }}">
                        <label for="payment_date" class="control-label">Payment Date</label>
                        <input id="payment_date" type="text" class="form-control" name="payment_date" placeholder="dd/mm/yyyy" value="{{ old('payment_date') }}">
                        @if ($errors->has('payment_date')) <div class="help-block cs-error">{{ $errors->first('payment_date') }}</div> @endif
                      </div>

                      <div class="form-group{{ $errors->has('paymentFrequency') ? ' has-error' : '' }}">
                        <label for="paymentFrequency" class="control-label">Payment Frequency</label>
                        <select name="paymentFrequency" class="form-control">
                        <option value="">Please Select</option>
                        @foreach($payment_frequencies as $frequecy)
                         <option value="{{ $frequecy->id_schedule_type }}">{{ $frequecy->description }}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('paymentFrequency')) <div class="help-block cs-error">{{ $errors->first('paymentFrequency') }}</div> @endif
                      </div>

                      <div class="row">
                      <div class="col-md-6">
                        <a href="{{url('parent/my-child-care')}}" class="btn btn-block btn-default">Cancel Regular Payment</a>
                      </div>
                        <div class="col-md-6">
                          <button class="btn btn-success btn-block">Create <i class="fa fa-chevron-right"></i></button>
                        </div>
                      </div>

                    </fieldset>
                  </section>

                </form>

              </div>
            </div>
          </article>
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
