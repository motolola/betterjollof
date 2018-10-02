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
                        <h1 class="text-uppercase">My Salary sacrifice agreement</h1>
                        <p class="alert alert-danger" >If you want to request to leave the  voucher scheme please click this button <a href="" class="btn btn-danger btn-sm"><i class="fa fa-times-circle"></i> Leave the Scheme</a></p>


                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis finibus in lacus eu pharetra. Phasellus efficitur lectus urna, suscipit venenatis est pretium eu. Sed porta neque nulla, sit amet molestie eros laoreet eu. Vestibulum sit amet ornare eros. Proin ac enim quis velit dignissim volutpat ut ut elit. Duis varius, turpis non varius ullamcorper, tellus dui blandit orci, nec faucibus leo felis vel orci. Maecenas fringilla purus urna, in vulputate eros posuere sit amet.</p>


                        <h2 class="text-uppercase">Prior Agreements</h2>
                        <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                            <thead>
                                <tr>
                                        <tr>
                                   <th rowspan="2" style="vertical-align: middle;">Total Earnings (Income Tax rate)*</th>
                                    <th colspan="3">Amount you can take</th>
                        
                                </tr>
                             
                                    <th>Weekly</th>
                                    <th>Monthly</th>
                                    <th>Annually</th>
                                </tr>
                        
                            </thead>
                            <tbody>    
                                <tr>
                                    <td>Up to but not exceeding &pound;42,386 (basic rate)</td>
                                    <td>&pound; 55 </td>
                                    <td>&pound; 243 </td>
                                     <td>&pound; 2,915 </td>
                                </tr>
                                    <tr>
                                    <td>Greater than &pound;42,386 but less than &pound;150,000 (higher rate)</td>
                                    <td>&pound; 28 </td>
                                    <td>&pound; 124 </td>
                                     <td>&pound; 1,484 </td>
                                </tr>
                                        <tr>
                                    <td>Over &pound;150,000 (additional rate)</td>
                                    <td>&pound; 25 </td>
                                    <td>&pound; 110 </td>
                                     <td>&pound; 1,325 </td>
                                </tr>
                            </tbody>
                        </table>
                        <p>
                            * Your total earnings including salary, other taxable benefits and allowances
                        </p>
                        <p>
                            Please speak to your HR department if you are unsure of the value of tax abd NI exempt childcare vouchers you are entitled to take.
                        </p>

<div class="row">
<div class="col-md-8 col-md-offset-2">
   <form class="form" role="form" method="POST" action="/parent/payroll-deduction">
  <section>
                        <fieldset><legend>Change Request</legend>


                         <p class="alert alert-warning">
                                Your current BEA is : Not Specified 
                            </p>


                            <div class="form-group{{ $errors->has('payroll_number') ? ' has-error' : '' }}">
                                <label for="payroll_number" class="control-label">Payroll Number</label>
                                <input id="payroll_number" type="text" class="form-control" name="payroll_number" placeholder="e.g. 178273464" value="">
                            </div>

                            <p class="alert alert-info">
                                Current Order value (&pound;) : &pound;243.00 
                            </p>

                            <div class="form-group{{ $errors->has('new_voucher_order_value') ? ' has-error' : '' }}">
                                <label for="new_voucher_order_value" class="control-label">New Voucher order value (&pound;)</label>
                                <input id="new_voucher_order_value" type="text" class="form-control" name="new_voucher_order_value" value="">
                            </div>



                            <div class="form-group{{ $errors->has('voucher_type') ? ' has-error' : '' }}">
                                <label for="voucher_type" class="control-label">Voucher Type</label>
                                <select id="voucher_type" class="form-control" name="voucher_type">
                                <option>electronic</option>
                                     <option>more ......</option>
                                </select>
                            </div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios">I want to change my voucher amount</label>
  <div class="col-md-8">
  <div class="radio">
    <label for="radios-0">
      <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
      For my next order only
    </label>
    </div>
  <div class="radio">
    <label for="radios-1">
      <input type="radio" name="radios" id="radios-1" value="2">
     For my next order and all subsequent orders
    </label>
    </div>
  </div>
</div>



                            <div class="form-group{{ $errors->has('reason_for_change') ? ' has-error' : '' }}">
                                <label for="reason_for_change" class="control-label">Reason for change</label>
                                <input id="reason_for_change" type="text" class="form-control" name="reason_for_change" placeholder="Please supply a reason" value="">
                            </div>

<p class="alert alert-info"><strong>Please note :</strong><br> Any changes you request will not take place until approved by your employer</p>

<div class="row">
<div class="col-md-4 col-md-offset-8">
<button class="btn btn-default btn-block btn-lg">Save <i class="fa fa-chevron-right"></i></button>
</div>
</div>

                        </fieldset>
                    </section>           

</form>

<!-- success message -->
<div class="alert alert-info">
<h2><i class="fa fa-check"></i> Your change request has been sent</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam dolor voluptate sit autem ea, vitae. Eum, fuga tempora porro consequatur vel, temporibus, labore atque vero laboriosam numquam hic praesentium, mollitia.</p>

</div>





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
