@extends('layouts.parent')


@section('squiggle-box')
@endsection

@section('content')
<section>
  <div class="cs-content">
    <div class="container">


      <div class="cs-contrast-box text-left">

        <div class="alert alert-danger">
          <b>Ready for Review</b>
        </div>

        <h1 class="">Maternity Pay / Childcare Voucher Calculator</h1>


        <div class="row">

          <div class="col-md-12">

            <h2>Childcare Vouchers during pregnancy at work and SMP <small>(Statutory Maternity Pay)</small></h2>
            <p>Should you wish to continue with childcare vouchers while you are pregnant then you will receive lower Statutory Maternity Pay (SMP) for the first six weeks of your maternity leave i.e. SMP will be based on your lower salary, not including childcare vouchers.</p>
            <p>In order to receive full SMP you must withdraw from the scheme before you are 17 weeks pregnant. However in order to calculate whether you will be better off continuing to receive childcare vouchers while you are pregnant and still working, or withdrawing from the scheme before you are 17 weeks pregnant, use this calculator.</p>
            <h2>Childcare Vouchers and employer top up pay during maternity leave</h2>
            <p>Should you receive top up pay during at least the first six weeks of SMP, you will be better off continuing to receive childcare vouchers during your pregnancy, should you require them.</p>
            <h2>Childcare vouchers and maternity leave</h2>
            <p>Should you continue to require childcare vouchers for your elder child/children during maternity leave - then you may continue to receive them from your employer. Your SMP will not be affected.</p>

            <hr>

          </div>
        </div>


        <div class="row">

          <div class="col-md-12">

            <fieldset>
              <legend>Calculator</legend>
              <form class="form" role="form" method="Post" action="{{ url('parent/maternity-result#results') }}">
                <div class="form-group{{ $errors->has('annual_salary') ? ' has-error' : '' }}">
                  <label for="annual_salary" class="control-label">
                    Basic Pay
                    <small class="text-muted">(i.e Annual Salary)</small>
                  </label>
                  <input required type="number" min="0" id="annual_salary" class="form-control" name="annual_salary" value="{{ old('annual_salary') }}">
                </div>

                <div class="form-group{{ $errors->has('childcare_vouchers') ? ' has-error' : '' }}">
                  <label for="childcare_vouchers" class="control-label">
                    Amount of Childcare Vouchers (CVs) required per annum (Max £2,916 per year)
                  </label>
                  <input required id="childcare_vouchers" type="number" min="0" class="form-control" name="childcare_vouchers" value="{{ old('childcare_vouchers') }}">
                </div>

                <div class="form-group{{ $errors->has('weeks_pregnant') ? ' has-error' : '' }}">
                  <label for="weeks_pregnant" class="control-label">
                    Enter the number of weeks pregnant that you will be when you intend to go on maternity leave e.g. 37
                  </label>
                  <select class="form-control" name="weeks_pregnant" id="weeks_pregnant">
                    @foreach (range(1,40) as $i):
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endforeach;
                  </select>
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
              </form>
            </fieldset>
          </div>
        </div>



        @if(!empty($result))
        <div id="results" class="row">
          <div class="col-md-12">
            <div class="alert alert-success">
              <h3 class="lead"><abbr title="Statutory Maternity Pay">SMP</abbr> for the first six months at 90% pay leaves scheme at 17 weeks pregnant.</h3>

              <table class="table table-bordered table-condensed success">
                <tbody>
                  <tr>
                    <td><abbr title="Statutory Maternity Pay">SMP</abbr> payment for first 6 weeks at 90% of salary will be higher by</td>
                    <td>{{ Helper::currency($result['smp_payments']) }}</td>
                  </tr>
                  <tr>
                    <td>Less Tax and NI at effective tac rate</td>
                    <td>{{ Helper::currency($result['less_tax']) }}</td>
                  </tr>
                  <tr class="active">
                    <td><b>Net <abbr title="Statutory Maternity Pay">SMP</abbr> payable</b></td>
                    <td><b>{{ Helper::currency($result['smp_net_payable']) }}</b></td>
                  </tr>
                  <tr>
                    <td>Number of weeks between 17 weeks and your selected scheme leave date.</td>
                    <td>{{ Helper::currency($result['no_weeks_until_leave']) }}</td>
                  </tr>
                  <tr>
                    <td>Tax and NI saving on Childcare Vouchers at effective tax rate</td>
                    <td>{{ Helper::currency($result['tax_saving']) }}</td>
                  </tr>
                  <tr class="active">
                    <td><b>You would be financially better off by staying in the Childcare Voucher scheme until you go on maternity leave by</b></td>
                    <td><b class="float-right">{{ Helper::currency($result['outcome']) }}</b></td>
                  </tr>
                </tbody>
              </table>

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
