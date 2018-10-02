@extends('layouts.employer')


@section('squiggle-box')
@endsection

@section('content')
<section>
<div class="cs-content">
    <div class="container">

        <form class="form" role="form" method="POST" action="{{ route('employer-bea-submit') }}">

            <div class="row">

                <div class="col-md-12">

                  <br>
                  <div class="alert alert-danger">
                    <b>Ready for Review</b>
                  </div>

                    <h1>Basic Earnings Assessment Calculator</h1>
                    <div class="alert alert-info text-center">For new joiners to the childcare voucher (cv) scheme from 6 april 2011 and the annual re-assessment of those joiners every april.</div>
                    <strong>The Earnings Assessment Calculator is based on the information provided by HRMC to date and is subject to change should further guidance be provided by HMRC.</strong>
                    It is important that you print the results of this assessment and retain with your employee's records
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">

                    <div class="text-right">
                        <span>Date of Assessment: {{ $today }}</span>
                    </div>
                </div>

                <div class="col-md-12">
                    <fieldset>
                        <legend>Employee Details</legend>

                        <div class="form-group{{ $errors->has('employee_name') ? ' has-error' : '' }}">
                            <label for="employee_name" class="control-label">Name</label>
                            <input required id="employee_name" type="text" class="form-control" name="employee_name" value="{{ old('employee_name') }}">
                        </div>

                        <div class="form-group{{ $errors->has('employee_number') ? ' has-error' : '' }}">
                            <label for="employee_number" class="control-label">Employee Number</label>
                            <input id="employee_number" type="text" class="form-control" name="employee_number" value="{{ old('employee_number') }}">
                        </div>

                        <div class="form-group{{ $errors->has('employee_ni_number') ? ' has-error' : '' }}">
                            <label for="employee_ni_number" class="control-label">NI Number</label>
                            <input id="employee_ni_number" type="text" class="form-control" name="employee_ni_number" value="{{ old('employee_ni_number') }}">
                        </div>

                        <div class="checkbox{{ $errors->has('is_blind') ? ' has-error' : '' }}">
                            <label>
                                <input type="checkbox" id="is_blind" name="is_blind">
                                Does the employee have a visual impairment and are they registered as a blind person?
                            </label>
                        </div>

                    </fieldset>
                </div>
                <div class="col-md-12">

                    <fieldset>
                        <legend>Taxable Income Elements</legend>

                        <div class="form-group{{ $errors->has('employee_annual_salary') ? ' has-error' : '' }}">
                            <label for="employee_annual_salary" class="control-label">
                                Basic Pay
                                <small class="text-muted">(i.e Annual Salary)</small>
                            </label>
                            <input required type="number" min="0" id="employee_annual_salary" class="form-control" name="employee_annual_salary" value="{{ old('employee_annual_salary') }}">
                        </div>

                        <div class="form-group{{ $errors->has('less_pension') ? ' has-error' : '' }}">
                            <label for="less_pension" class="control-label">
                                Less: Employee Pension Contribution or AVS
                                <small class="text-muted">(up to £50,000 i.e the upper limit for Tax Relief)</small>
                            </label>
                            <input id="less_pension" type="number" min="0" class="form-control" name="less_pension" value="{{ old('less_pension') }}">
                        </div>

                        <div class="form-group{{ $errors->has('less_giving') ? ' has-error' : '' }}">
                            <label for="less_giving" class="control-label">Less: Deductions under payroll giving</label>
                            <input id="less_giving" type="number" min="0" class="form-control" name="less_giving" value="{{ old('less_giving') }}">
                        </div>

                        <div class="form-group{{ $errors->has('bonus') ? ' has-error' : '' }}">
                            <label for="bonus" class="control-label">Contractual/Guaranteed Bonus</label>
                            <input id="bonus" type="number" min="0" class="form-control" name="bonus" value="{{ old('bonus') }}">
                        </div>

                        <div class="form-group{{ $errors->has('comission') ? ' has-error' : '' }}">
                            <label for="comission" class="control-label">
                                Commission
                                <small class="text-muted">(based on the previous year's commission or an average of the previous two years, if lower)</small>
                            </label>
                            <input id="comission" type="number" min="0" class="form-control" name="comission" value="{{ old('comission') }}">
                        </div>

                        <div class="form-group{{ $errors->has('regional_weighting') ? ' has-error' : '' }}">
                            <label for="regional_weighting" class="control-label">London Weighting or Other regional allowance</label>
                            <input id="regional_weighting" type="number" min="0" class="form-control" name="regional_weighting" value="{{ old('regional_weighting') }}">
                        </div>

                        <div class="form-group{{ $errors->has('overtime') ? ' has-error' : '' }}">
                            <label for="overtime" class="control-label">
                                Guaranteed overtime payments
                                <small class="text-muted">(e.g. Payments of 4 hours guaranteed overtime for working on Saturdays, even if the amount of time actually worked is less)</small>
                            </label>
                            <input id="overtime" type="number" min="0" class="form-control" name="overtime" value="{{ old('overtime') }}">
                        </div>

                        <div class="form-group{{ $errors->has('shift_allowance') ? ' has-error' : '' }}">
                            <label for="shift_allowance" class="control-label">Shift Allowance</label>
                            <input id="shift_allowance" type="number" min="0" class="form-control" name="shift_allowance" value="{{ old('shift_allowance') }}">
                        </div>

                        <div class="form-group{{ $errors->has('skills_allowance') ? ' has-error' : '' }}">
                            <label for="skills_allowance" class="control-label">Special payments for specialist qualifications e.g. (First Aiders)</label>
                            <input id="skills_allowance" type="number" min="0" class="form-control" name="skills_allowance" value="{{ old('skills_allowance') }}">
                        </div>

                        <div class="form-group{{ $errors->has('recruitment_allowance') ? ' has-error' : '' }}">
                            <label for="recruitment_allowance" class="control-label">Retention and recruitment allowances</label>
                            <input id="recruitment_allowance" type="number" min="0" class="form-control" name="recruitment_allowance" value="{{ old('recruitment_allowance') }}">
                        </div>

                        <div class="form-group{{ $errors->has('market_rate_supplement') ? ' has-error' : '' }}">
                            <label for="market_rate_supplement" class="control-label">Market rate supplements</label>
                            <input id="market_rate_supplement" type="number" min="0" class="form-control" name="market_rate_supplement" value="{{ old('market_rate_supplement') }}">
                        </div>

                        <div class="form-group{{ $errors->has('cash_equivelent_benefits') ? ' has-error' : '' }}">
                            <label for="cash_equivelent_benefits" class="control-label">
                                Cash equivalent of taxable benefits
                                <small class="text-muted">(e.g. car allowance, cash vouchers, childcare vouchers in excess of tax relief entitlement, living accommodation)</small>
                            </label>
                            <input id="cash_equivelent_benefits" type="number" min="0" class="form-control" name="cash_equivelent_benefits" value="{{ old('cash_equivelent_benefits') }}">
                        </div>

                    </fieldset>

                </div>

                <div class="col-md-12">

                    <fieldset>
                        <legend>Taxable Benefits</legend>

                        <div class="form-group{{ $errors->has('car_benefit') ? ' has-error' : '' }}">
                            <label for="car_benefit" class="control-label">Car Benefit</label>
                            <input id="car_benefit" type="number" min="0" class="form-control" name="car_benefit" value="{{ old('car_benefit') }}">
                        </div>

                        <div class="form-group{{ $errors->has('fuel_benefit') ? ' has-error' : '' }}">
                            <label for="fuel_benefit" class="control-label">
                                Fuel Benefit
                                <small class="text-muted">(free fuel provided by an employer for a company car)</small>
                            </label>
                            <input id="fuel_benefit" type="number" min="0" class="form-control" name="fuel_benefit" value="{{ old('fuel_benefit') }}">
                        </div>

                        <div class="form-group{{ $errors->has('medical_insurance') ? ' has-error' : '' }}">
                            <label for="medical_insurance" class="control-label">Private Medical Insurance</label>
                            <input id="medical_insurance" type="number" min="0" class="form-control" name="medical_insurance" value="{{ old('medical_insurance') }}">
                        </div>

                        <div class="form-group{{ $errors->has('dental_plan') ? ' has-error' : '' }}">
                            <label for="dental_plan" class="control-label">Dental Plan</label>
                            <input id="dental_plan" type="number" min="0" class="form-control" name="dental_plan" value="{{ old('dental_plan') }}">
                        </div>

                        <div class="form-group{{ $errors->has('life_assurance') ? ' has-error' : '' }}">
                            <label for="life_assurance" class="control-label">Life Assurance</label>
                            <input id="life_assurance" type="number" min="0" class="form-control" name="life_assurance" value="{{ old('life_assurance') }}">
                        </div>

                        <div class="form-group{{ $errors->has('gym_membership') ? ' has-error' : '' }}">
                            <label for="gym_membership" class="control-label">Gym Membership</label>
                            <input id="gym_membership" type="number" min="0" class="form-control" name="gym_membership" value="{{ old('gym_membership') }}">
                        </div>

                        <div class="form-group{{ $errors->has('cash_vouchers') ? ' has-error' : '' }}">
                            <label for="cash_vouchers" class="control-label">Cash Vouchers</label>
                            <input id="cash_vouchers" type="number" min="0" class="form-control" name="cash_vouchers" value="{{ old('cash_vouchers') }}">
                        </div>

                        <div class="form-group{{ $errors->has('other_1') ? ' has-error' : '' }}">
                            <label for="other_1" class="control-label">Other 1</label>
                            <input id="other_1" type="number" min="0" class="form-control" name="other_1" value="{{ old('other_1') }}">
                        </div>

                        <div class="form-group{{ $errors->has('other_2') ? ' has-error' : '' }}">
                            <label for="other_2" class="control-label">Other 2</label>
                            <input id="other_2" type="number" min="0" class="form-control" name="other_2" value="{{ old('other_2') }}">
                        </div>

                        <div class="form-group{{ $errors->has('other_3') ? ' has-error' : '' }}">
                            <label for="other_3" class="control-label">Other 3</label>
                            <input id="other_3" type="number" min="0" class="form-control" name="other_3" value="{{ old('other_3') }}">
                        </div>


                    </fieldset>

                </div>

                <div class="col-md-12">
                    <fieldset>
                        <legend>Other Salary Sacrifice Arrangements <small>(excl. pension)</small></legend>

                       <div class="form-group{{ $errors->has('less_cycle') ? ' has-error' : '' }}">
                            <label for="less_cycle" class="control-label">Cycle to Work Schemes</label>
                            <input id="less_cycle" type="number" min="0" class="form-control" name="less_cycle" value="{{ old('less_cycle') }}">
                        </div>

                       <div class="form-group{{ $errors->has('less_leave') ? ' has-error' : '' }}">
                            <label for="less_leave" class="control-label">Annual Leave Purchase</label>
                            <input id="less_leave" type="number" min="0" class="form-control" name="less_leave" value="{{ old('less_leave') }}">
                        </div>

                       <div class="form-group{{ $errors->has('less_green_car') ? ' has-error' : '' }}">
                            <label for="less_green_car" class="control-label">Green Car Hire</label>
                            <input id="less_green_car" type="number" min="0" class="form-control" name="less_green_car" value="{{ old('less_green_car') }}">
                        </div>

                       <div class="form-group{{ $errors->has('less_tech') ? ' has-error' : '' }}">
                            <label for="less_tech" class="control-label">Green Car Hire</label>
                            <input id="less_tech" type="number" min="0" class="form-control" name="less_tech" value="{{ old('less_tech') }}">
                        </div>

                        <div class="form-group{{ $errors->has('less_other_1') ? ' has-error' : '' }}">
                            <label for="less_other_1" class="control-label">Other 1</label>
                            <input id="less_other_1" type="number" min="0" class="form-control" name="less_other_1" value="{{ old('less_other_1') }}">
                        </div>

                        <div class="form-group{{ $errors->has('less_other_2') ? ' has-error' : '' }}">
                            <label for="less_other_2" class="control-label">Other 2</label>
                            <input id="less_other_2" type="number" min="0" class="form-control" name="less_other_2" value="{{ old('less_other_2') }}">
                        </div>

                        <div class="form-group{{ $errors->has('less_other_3') ? ' has-error' : '' }}">
                            <label for="less_other_3" class="control-label">Other 3</label>
                            <input id="less_other_3" type="number" min="0" class="form-control" name="less_other_3" value="{{ old('less_other_3') }}">
                        </div>

                    </fieldset>
                </div>

                <div class="col-md-12">

                    <fieldset>
                        <legend>Childcare Vouchers</legend>

                        <div class="form-group{{ $errors->has('childcare_vouchers') ? ' has-error' : '' }}">
                            <label for="childcare_vouchers" class="control-label">
                                Amount of Childcare Vouchers (CVs) required per annum (Max £2,916 per year)
                            </label>
                            <input required id="childcare_vouchers" type="number" min="0" class="form-control" name="childcare_vouchers" value="{{ old('childcare_vouchers') }}">
                        </div>

                    </fieldset>

                </div>
            </div>



            <div class="row">

                <div class="col-md-12">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="form-group text-right">
                        <button class="btn btn-default btn-lg" type="submit">Save &amp; Submit</button>
                    </div>

                </div>

            </div>
        </form>
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
