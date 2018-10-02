@extends('layouts.parent')


@section('squiggle-box')
@endsection

@section('content')
<section>
    <div class="cs-content">
        <div class="container">
            <div class="cs-contrast-box text-left">
                <h1 class="">Working Tax Credit Calculator</h1>
                <form class="form" role="form" method="Post" action="{{ url('parent/wtc-result') }}">

                  <div class="alert alert-danger">
                    <b>In Development</b>
                  </div>

                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend>About You</legend>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input name="has_partner" type="checkbox"><b>Do you have a partner?</b>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('over_50_oow_benefits') ? ' has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                            <input name="over_50_oow_benefits" type="checkbox">Are you aged 50 or more, are you returning to work after six months or more spent on qualifiying out of work benefits?
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('is_disabled') ? ' has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                            <input name="is_disabled" type="checkbox">Are you disabled.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('has_disability_allowance') ? ' has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                            <input name="has_disability_allowance" type="checkbox">Did you receive Disability Living Allowance (Higher care element) or attendance allowance (higher rate)?
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                    <label for="age" class="control-label">
                                        How old are you?
                                    </label>
                                    <input type="number" min="0" id="age" class="form-control" name="age" value="{{ old('age') }}">
                                </div>
                                <div class="well well-sm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('annual_earnings') ? ' has-error' : '' }}">
                                                <label for="annual_earnings" class="control-label">
                                                    Yearly Earnings
                                                </label>
                                                <input type="number" min="0" id="annual_earnings" class="form-control" name="annual_earnings" value="{{ old('annual_earnings') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('weekly_earnings') ? ' has-error' : '' }}">
                                                <label for="weekly_earnings" class="control-label">
                                                    Weekly Earnings
                                                </label>
                                                <input type="number" min="0" id="weekly_earnings" class="form-control" name="weekly_earnings" value="{{ old('weekly_earnings') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <small class="help-block text-muted">Your earnings from all paid jobs before any deductions, all taxable benefits and any net self-employed profit in the last complete tax year?</small>

                                </div>

                                <div class="form-group{{ $errors->has('other_income') ? ' has-error' : '' }}">
                                    <label for="other_income" class="control-label">
                                        Do you have any other income?
                                    </label>
                                    <input type="number" min="0" id="other_income" class="form-control" name="other_income" value="{{ old('other_income') }}">
                                </div>

                                <div class="form-group{{ $errors->has('weekly_hours') ? ' has-error' : '' }}">
                                    <label for="weekly_hours" class="control-label">
                                        How many hours of paid work do you do per week?
                                    </label>
                                    <input type="number" min="0" id="weekly_hours" class="form-control" name="weekly_hours" value="{{ old('weekly_hours') }}">
                                </div>

                                <div class="form-group{{ $errors->has('annual_childcare_amount') ? ' has-error' : '' }}">
                                    <label for="annual_childcare_amount" class="control-label">
                                        What is your annual childcare salary sacrifice amount (max £2,916 per year)?
                                    </label>
                                    <input type="number" min="0" id="annual_childcare_amount" class="form-control" name="annual_childcare_amount" value="{{ old('annual_childcare_amount') }}">
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset>
                                <legend>About Your Partner</legend>
                                <br>
                                <div class="form-group{{ $errors->has('partner_over_50_oow_benefits') ? ' has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                            <input name="partner_over_50_oow_benefits" type="checkbox">Is your partner aged 50 or more, are you returning to work after six months or more spent on qualifiying out of work benefits?
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('partner_is_disabled') ? ' has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                            <input name="partner_is_disabled" type="checkbox">Is your partner disabled?
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('partner_has_disability_allowance') ? ' has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                            <input name="partner_has_disability_allowance" type="checkbox">Does your partner receive Disability Living Allowance (Higher care element) or attendance allowance (higher rate)?
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('partner_age') ? ' has-error' : '' }}">
                                    <label for="partner_age" class="control-label">
                                        How old is your partner
                                    </label>
                                    <input type="number" min="0" id="partner_age" class="form-control" name="partner_age" value="{{ old('partner_age') }}">
                                </div>
                                <div class="well well-sm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('partner_annual_earnings') ? ' has-error' : '' }}">
                                                <label for="partner_annual_earnings" class="control-label">
                                                    Yearly Earnings
                                                </label>
                                                <input type="number" min="0" id="partner_annual_earnings" class="form-control" name="partner_annual_earnings" value="{{ old('partner_annual_earnings') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('partner_weekly_earnings') ? ' has-error' : '' }}">
                                                <label for="partner_weekly_earnings" class="control-label">
                                                    Weekly Earnings
                                                </label>
                                                <input type="number" min="0" id="partner_weekly_earnings" class="form-control" name="partner_weekly_earnings" value="{{ old('partner_weekly_earnings') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <small class="help-block text-muted">Your partners earnings from all paid jobs before any deductions, all taxable benefits and any net self-employed profit in the last complete tax year?</small>
                                </div>

                                <div class="form-group{{ $errors->has('partner_other_income') ? ' has-error' : '' }}">
                                    <label for="partner_other_income" class="control-label">
                                        Do you have any other income?
                                    </label>
                                    <input type="number" min="0" id="partner_other_income" class="form-control" name="partner_other_income" value="{{ old('partner_other_income') }}">
                                </div>

                                <div class="form-group{{ $errors->has('partner_weekly_hours') ? ' has-error' : '' }}">
                                    <label for="partner_weekly_hours" class="control-label">
                                        How many hours of paid work do you do per week?
                                    </label>
                                    <input type="number" min="0" id="partner_weekly_hours" class="form-control" name="partner_weekly_hours" value="{{ old('partner_weekly_hours') }}">
                                </div>

                                <div class="form-group{{ $errors->has('partner_annual_childcare_amount') ? ' has-error' : '' }}">
                                    <label for="partner_annual_childcare_amount" class="control-label">
                                        What is your annual childcare salary sacrifice amount (max £2,916 per year)?
                                    </label>
                                    <input type="number" min="0" id="partner_annual_childcare_amount" class="form-control" name="partner_annual_childcare_amount" value="{{ old('partner_annual_childcare_amount') }}">
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <fieldset>
                        <legend>About Your Children</legend>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group{{ $errors->has('children_under_1') ? ' has-error' : '' }}">
                                    <label for="children_under_1" class="control-label">
                                        How many children do you have aged under 1?
                                    </label>
                                    <input type="number" min="0" id="children_under_1" class="form-control" name="children_under_1" value="{{ old('children_under_1') }}">
                                </div>

                                <div class="form-group{{ $errors->has('children_between_1_15') ? ' has-error' : '' }}">
                                    <label for="children_between_1_15" class="control-label">
                                        How many children do you have aged between 1 and 15?
                                    </label>
                                    <input type="number" min="0" id="children_between_1_15" class="form-control" name="children_between_1_15" value="{{ old('children_between_1_15') }}">
                                </div>

                                <div class="form-group{{ $errors->has('children_between_15_18') ? ' has-error' : '' }}">
                                    <label for="children_between_15_18" class="control-label">
                                        How many children do you have aged between 15 and 18?
                                    </label>
                                    <input type="number" min="0" id="children_between_15_18" class="form-control" name="children_between_15_18" value="{{ old('children_between_15_18') }}">
                                </div>

                                <div class="form-group{{ $errors->has('children_disabled') ? ' has-error' : '' }}">
                                    <label for="children_disabled" class="control-label">
                                        How many of your children are disabled?
                                    </label>
                                    <input type="number" min="0" id="children_disabled" class="form-control" name="children_disabled" value="{{ old('children_disabled') }}">
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group{{ $errors->has('children_w_disability_allowance') ? ' has-error' : '' }}">
                                    <label for="children_w_disability_allowance" class="control-label">
                                        How many of these children receive the Disability Living Allowance (Higher Care element)?
                                    </label>
                                    <input type="number" min="0" id="children_w_disability_allowance" class="form-control" name="children_w_disability_allowance" value="{{ old('children_w_disability_allowance') }}">
                                </div>

                                <div class="form-group{{ $errors->has('children_registered') ? ' has-error' : '' }}">
                                    <label for="children_registered" class="control-label">
                                        For how many children do you have registered or approved childcare?
                                    </label>
                                    <input type="number" min="0" id="children_registered" class="form-control" name="children_registered" value="{{ old('children_registered') }}">
                                </div>

                                <div class="form-group{{ $errors->has('weekly_childcare_cost') ? ' has-error' : '' }}">
                                    <label for="weekly_childcare_cost" class="control-label">
                                        How much is the weekly cost of registered childcare?
                                    </label>
                                    <input type="number" min="0" id="weekly_childcare_cost" class="form-control" name="weekly_childcare_cost" value="{{ old('weekly_childcare_cost') }}">
                                </div>

                            </div>
                        </div>
                    </fieldset>

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="text-right">
                    <button class="btn btn-default btn-lg" type="submit">Calculate</button>
                    </div>
                </form>
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
