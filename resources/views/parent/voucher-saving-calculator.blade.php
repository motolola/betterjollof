@extends('layouts.parent')


@section('squiggle-box')
@endsection

@section('content')
<section>
<div class="cs-content">
    <div class="container">


    <div class="cs-contrast-box text-left">
        <h1 class="">Childcare Voucher Saving Calculator</h1>
        <form class="form" role="form" method="Post" action="{{ url('parent/vs-result#results') }}">

            <div class="row">

                <div class="col-md-12">

                  <div class="alert alert-danger">
                    <b>Ready for Review</b>
                  </div>

                    <div class="alert alert-info text-center">This calculator is for new parents looking to join the Childcare voucher Scheme since April 2011</div>
                    <p><strong>Note: The maximum voucher value is determined by the tax rate you are taxed at:</strong></p>

                    <fieldset>
                        <legend>Maximum Childcare Voucher Value</legend>

                        <table class="table table-hover table-striped table-condensed table-responsive ">

                            <tr>
                                <th>Band</th>
                                <th>Annual Pay Range</th>
                                <th>Per Month</th>
                                <th>Per Year</th>
                            </tr>
                            @foreach ($taxBands as $key => $band)
                            <tr>
                                <td>{{ $band->label }}</td>
                                <td>{{ Helper::currency($band->income_from) }} {{ $band->income_to ? '- '.Helper::currency($band->income_to) : ' Upwards' }}</td>
                                <td>{{ Helper::currency($band->monthly_limit) }}</td>
                                <td>{{ Helper::currency($band->annual_limit) }}</td>
                            </tr>
                            @endforeach
                        </table>

                    </fieldset>

                </div>
            </div>


            <div class="row">

                <div class="col-md-12">

                    <fieldset>
                        <legend>Savings Calculator</legend>

                        <div class="form-group{{ $errors->has('employee_annual_salary') ? ' has-error' : '' }}">
                            <label for="employee_annual_salary" class="control-label">
                                Basic Pay
                                <small class="text-muted">(i.e Annual Salary)</small>
                            </label>
                            <input required type="number" min="0" id="employee_annual_salary" class="form-control" name="employee_annual_salary" value="{{ old('employee_annual_salary') }}">
                        </div>

                        <div class="form-group{{ $errors->has('childcare_vouchers') ? ' has-error' : '' }}">
                            <label for="childcare_vouchers" class="control-label">
                                Amount of Childcare Vouchers (CVs) required per annum (Max £2,916 per year)
                            </label>
                            <input required id="childcare_vouchers" type="number" min="0" class="form-control" name="childcare_vouchers" value="{{ old('childcare_vouchers') }}">
                        </div>

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
                            <button class="btn btn-default btn-lg" type="submit">Calculate</button>
                        </div>

                    </fieldset>
                </div>
            </div>
        </form>


        @if(!empty($annualSaving))
        <div id="results" class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <p class="lead">Results</p>
                    <p>Annual Savings: {{ Helper::currency($annualSaving) }}</p>
                    <p>Monthly Savings: {{ Helper::currency($monthlySaving) }}</p>
                </div>
            </div>
        </div>
        @endif

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
