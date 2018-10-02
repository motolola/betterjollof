@extends('layouts.employer')


@section('squiggle-box')
@endsection

@section('content')
<section>
    <div class="cs-content">
        <div class="container">

            <div class="text-left">
                <h1>Basic Earnings Assessment Calculator</h1>


<div class="alert alert-danger">
    Please be aware this calculator is still in development and as such does not save the data on this page anywhere.
    This calculator so far only calculates  basic earnings.
    Please can you check the results and ensure they are accurate.
</div>

                <fieldset>
                    <legend>Assessment</legend>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <span class="control-label"><b>Employee Name</span>
                                <div class="">
                                    <span class="form-control-static">{{ $income->submission['employee_name'] }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Employee Number</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ $income->submission['employee_number'] }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Employee NI Number</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ $income->submission['employee_ni_number'] }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Annual Salary</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->annual_salary) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Registered Blind</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ $income->is_blind == true ? 'Yes' : 'No' }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Income Tax band</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ $income_tax->bands[$income_tax->active_band]->label }}</span>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <span class="control-label"><b>Total Income for CV Earnings Assessment</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->salary_after_benefits) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Personal Allowance</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->personal_allowance) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Total Income for CV Earnings Assessment Less Personal Allowance</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->income_less) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Amount of Childcare Vouchers (CVs) Required Per Annum</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['childcare_vouchers']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Taxable Income for CV Assessment</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->income_less_after_cv) }}</span>
                                </div>
                            </div>


                        </div>


                    </div>

                </fieldset>

                <h2>Submission Details</h2>

                <div class="row">

                    <div class="col-md-6">


                        <fieldset>
                            <legend>Taxable Income Elements for Earnings (in £ per annum)</legend>

                            <div class="form-group">
                                <span class="control-label"><b>Basic Pay</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->annual_salary) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Less: Employee Pension Contributions or AVCs</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['less_pension']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Less: Deductions Under Payroll Giving </b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['less_giving']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Contractual/Guaranteed Bonus </b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['bonus']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Commission </b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['comission']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>London Weighting or other regional allowance</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['regional_weighting']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Guaranteed overtime payments </b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['overtime']) }}</span>
                                </div>
                            </div>


                            <div class="form-group">
                                <span class="control-label"><b>Shift Allowance </b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['shift_allowance']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Special payments for specialist qualifications </b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['skills_allowance']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Retention and recruitment allowances</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['recruitment_allowance']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Market rate supplements </b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['market_rate_supplement']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Cash equivalent of taxable benefits e.g. car</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['cash_equivelent_benefits']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Cash equivalent of taxable benefits e.g. car allowance, cash vouchers, childcare vouchers in excess of tax relief entitlement, living accommodation</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['cash_equivelent_benefits']) }}</span>
                                </div>
                            </div>

                        </fieldset>
                    </div>

                    <div class="col-md-6">


                        <fieldset class="form-horizontal">
                            <legend>Taxable Benefits (in £ per annum)</legend>

                            <div class="form-group">
                                <span class="control-label"><b>Car Benefit</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['car_benefit']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Fuel Benefit</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['fuel_benefit']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Private Medical Insurance </b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['medical_insurance']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Dental Plan</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['dental_plan']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Life Assurance</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['life_assurance']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Gym Membership</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['gym_membership']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Cash Vouchers</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['cash_vouchers']) }}</span>
                                </div>
                            </div>


                            <div class="form-group">
                                <span class="control-label"><b>Other 1</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['other_1']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Other 2</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['other_2']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Other 3</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['other_3']) }}</span>
                                </div>
                            </div>


                        </fieldset>
                    </div>

                </div>

                <fieldset>
                    <legend>Schemes (LESS)</legend>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <span class="control-label"><b>Cycle to Work</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['less_cycle']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Leavesave</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['less_leave']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Green Car Save</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['less_green_car']) }}</span>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <span class="control-label"><b>Tech</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['less_tech']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Other 1</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['less_other_1']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Other 2</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['less_other_2']) }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="control-label"><b>Other 3</b></span>
                                <div class="">
                                    <span class="form-control-static">{{ Helper::currency($income->submission['less_other_3']) }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </fieldset>
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