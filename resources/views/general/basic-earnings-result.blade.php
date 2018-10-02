@extends('layouts.app')

@section('squiggle-box')
<div class="container">


    <div class="cs-contrast-box text-left">
        <h1 class="cs text-center">Basic Earnings Assessment Calculator</h1>

        <fieldset>
            <legend>Assessment</legend>

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <span class="control-label"><b>Employee Name</span>
                        <div class="">
                            <span class="form-control-static">{{ $assessment->submission['employee_name'] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="control-label"><b>Employee Number</b></span>
                        <div class="">
                            <span class="form-control-static">{{ $assessment->submission['employee_number'] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="control-label"><b>Employee NI Number</b></span>
                        <div class="">
                            <span class="form-control-static">{{ $assessment->submission['employee_ni_number'] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="control-label"><b>Annual Salary</b></span>
                        <div class="">
                            <span class="form-control-static">{{ Helper::currency($assessment->annual_salary) }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="control-label"><b>Registered Blind</b></span>
                        <div class="">
                            <span class="form-control-static">{{ $assessment->is_blind == true ? 'Yes' : 'No' }}</span>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        <span class="control-label"><b>Total Income for CV Earnings Assessment</b></span>
                        <div class="">
                            <span class="form-control-static">{{ Helper::currency($assessment->salary_after_benefits) }}</span>
                        </div>
                    </div>            

                    <div class="form-group">
                        <span class="control-label"><b>Personal Allowance</b></span>
                        <div class="">
                            <span class="form-control-static">{{ Helper::currency($assessment->personal_allowance) }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="control-label"><b>Total Income for CV Earnings Assessment Less Personal Allowance</b></span>
                        <div class="">
                            <span class="form-control-static">{{ Helper::currency($assessment->taxable_income) }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="control-label"><b>Amount of Childcare Vouchers (CVs) Required Per Annum</b></span>
                        <div class="">
                            <span class="form-control-static">{{ Helper::currency($assessment->submission['childcare_vouchers']) }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="control-label"><b>Taxable Income for CV Assessment</b></span>
                        <div class="">
                            <span class="form-control-static">{{ Helper::currency($assessment->taxable_income_after_cv) }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="control-label"><b>Tax</b></span>
                        <div class="">
                            <span class="form-control-static">
                                {{ $assessment->tax['band']->label }} at {{ $assessment->tax['band']->rate_percent or 0 }}%
                            </span>
                        </div>
                    </div>

                </div>
            </div>

        </fieldset>



        <div class="alert alert-danger">
            Please be aware this calculator is still in development and as such does not save the data on this page anywhere.
            This calculator so far only calculates  basic earnings.
        </div>
    </div>


</div>



@endsection


@section('additional_style')
{{-- Add custom stylesheet links here --}}
@endsection

@section('additional_script')
{{-- Add custom javascript links here --}}
<script>

    jQuery('input[required], input[required=required], input[required=true], input:required').prev('label').each(function () {
        var el = jQuery(this);
        var text = jQuery(this).html();
        el.html(text + ' *');
    });

    jQuery('body').find('*[name]').each(function (k,v) {
        console.log(v.name);
    });

</script>
@endsection

@section('modals')
{{-- Add modal markup here --}}
@endsection