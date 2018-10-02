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
              <h1>
                My Salary Sacrifice Agreement
                @if($effective_date)
                  <small>{{ Helper::customDate($effective_date) }}</small>
                @endif
              </h1>


              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis finibus in lacus eu pharetra. Phasellus efficitur lectus urna, suscipit venenatis est pretium eu. Sed porta neque nulla, sit amet molestie eros laoreet eu. Vestibulum sit amet ornare eros. Proin ac enim quis velit dignissim volutpat ut ut elit. Duis varius, turpis non varius ullamcorper, tellus dui blandit orci, nec faucibus leo felis vel orci. Maecenas fringilla purus urna, in vulputate eros posuere sit amet.</p>

              <fieldset>
                <legend>Maximum Childcare Voucher Value</legend>

                <table class="table table-hover table-striped table-condensed table-responsive ">
                  <tr>
                    <th>Band</th>
                    <th>Weekly</th>
                    <th>Per Month</th>
                    <th>Per Year</th>
                  </tr>
                  @if($tax_bands)
                    @foreach ($tax_bands as $key => $band)
                      <tr>
                        <td>{{ $band->label }}</td>
                        <td>{{ Helper::currency($band->weekly_limit) }}</td>
                        <td>{{ Helper::currency($band->monthly_limit) }}</td>
                        <td>{{ Helper::currency($band->annual_limit) }}</td>
                      </tr>
                    @endforeach
                  @endif
                </table>

                <p>
                  * Your total earnings including salary, other taxable benefits and allowances
                </p>
                <p>
                  Please speak to your HR department if you are unsure of the value of tax abd NI exempt childcare vouchers you are entitled to take.
                </p>

              </fieldset>


              {{-- @if($payroll_ref) --}}
              <div class="row">
                <div class="col-md-12">
                  <form class="form" role="form" method="POST" action="/parent/payroll-deduction">
                    <section>
                      <fieldset>
                        <legend>{{ isset($forced) ? 'Setup Payroll' : 'Change Request' }}</legend>

                        <input type="hidden" name="effective_date" value="{{ $effective_date }}">

                        <div class="form-group{{ $errors->has('payroll_number') ? ' has-error' : '' }}">
                          <label for="payroll_number" class="control-label">Payroll Number</label>
                          <input id="payroll_number" type="text" class="form-control" name="payroll_number" placeholder="e.g. 178273464" value="{{ $payroll_ref or old('payroll_number') }}">
                          @if ($errors->has('payroll_number'))
                            <div class="help-block cs-error">{{ $errors->first('payroll_number') }}</div>
                          @endif
                        </div>

                        <div class="form-group{{ $errors->has('new_voucher_order_value') ? ' has-error' : '' }}">
                          <label for="new_voucher_order_value" class="control-label">New Voucher order value (&pound;)</label>
                          <input id="new_voucher_order_value" type="text" class="form-control" name="new_voucher_order_value" value="{{  $selected_voucher->amount_requested or old('new_voucher_order_value')}}">
                          @if ($errors->has('new_voucher_order_value'))
                            <div class="help-block cs-error">{{ $errors->first('new_voucher_order_value') }}</div>
                          @endif
                        </div>

                        <div class="form-group{{ $errors->has('voucher_type') ? ' has-error' : '' }}">
                          <label for="voucher_type" class="control-label">Voucher Type</label>
                          <select id="voucher_type" class="form-control" name="voucher_type">
                            <option value="">Select</option>
                            <option selected value="electronic">Electronic</option>
                            <option value="paper">Paper</option>
                          </select>
                          @if ($errors->has('voucher_type'))
                            <div class="help-block cs-error">{{ $errors->first('voucher_type') }}</div>
                          @endif
                        </div>

                        <!-- Multiple Radios -->
                        <div class="row">
                          <label class="col-md-4 control-label" for="radios">I want to change my voucher amount</label>
                          <div class="col-md-8">
                            <div class="radio">
                              <label for="radios-0">
                                <input type="radio" name="single" id="radios-0" value="1" checked="checked">
                                For my next order only
                              </label>
                            </div>
                            <div class="radio">
                              <label for="radios-1">
                                <input type="radio" name="single" id="radios-1" value="0">
                                For my next order and all subsequent orders
                              </label>
                            </div>
                          </div>
                        </div>

                        @if(!isset($forced))
                          <div class="form-group{{ $errors->has('reason_for_change') ? ' has-error' : '' }}">
                            <label for="reason_for_change" class="control-label">Reason for change</label>
                            <input id="reason_for_change" type="text" class="form-control" name="reason_for_change" placeholder="Please supply a reason" value="">
                            @if ($errors->has('reason_for_change'))
                              <div class="help-block cs-error">{{ $errors->first('reason_for_change') }}</div>
                            @endif
                            <p class="alert alert-info"><strong>Please note :</strong><br> Any changes you request will not take place until approved by your employer</p>
                          </div>
                        @endif



                        <div class="row">
                          <div class="col-md-4 col-md-offset-8">
                            <button class="btn btn-default btn-block btn-lg">Submit</button>
                          </div>
                        </div>

                      </fieldset>
                    </section>

                  </form>

                  <p class="alert alert-danger" >If you want to request to leave the  voucher scheme please click this button <a href="" class="btn btn-danger btn-sm"><i class="fa fa-times-circle"></i> Leave the Scheme</a></p>

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
