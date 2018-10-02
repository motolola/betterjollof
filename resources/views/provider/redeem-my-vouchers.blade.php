@extends('layouts.provider')

@section('squiggle-box')
@endsection

@section('content')
  <div class="cs-content">
    <div class="container">

      <div class="col-md-12">
        <section>
          <h1 class="text-uppercase">Enter vouchers you wish to Redeem <span class="text-danger">(Page Under Construction)</span></h1>
          <div class="row">
            <div class="col-md-12">

              <form method="POST"  action="{{url('provider/redeem-vouchers')}}">

                <div class="form-group">
                  <label for="OnlineVoucherCode">Online Voucher Code</label>
                  <input type="text" class="form-control" id="OnlineVoucherCode" name="OnlineVoucherCode">
                </div>
                <h1>Or</h1>
                <div class="form-group">
                  <label for="AddParentID">Parent ID Number</label>
                  <input type="text" class="form-control" id="AddParentID" name="AddParentID">
                </div>
                <div class="form-group">

                  <input type="submit" class="btn btn-lg btn-success pull-right" value="Add">
                </div>

              </form>
              <hr>
              <p>There are no vouchers to display.</p>

            </div>

          </div>

          <hr>

          <h1 class="text-uppercase">Redemption Summary</h1>
          <div class="row">
            <div class="col-md-12">

              <form method="POST"  action="#">
                <table class="table">
                  <tr><th>Number of Vouchers</th><td>0</td></tr>
                  <tr><th>Total Value of vouchers</th><td>£0.00</td></tr>

                </table>

                <div class="form-group">
                  <label for="CustomerReference">Your Reference (optional)</label>
                  <input type="text" class="form-control" id="CustomerReference" name="CustomerReference">
                </div>
                <div class="form-group">
                  <a href="#" class="btn btn-lg btn-default">Cancel</a>
                  <input type="submit" class="btn btn-lg btn-success pull-right" value="REDEEM">
                </div>

              </form>
              <hr>
              <p>There are no vouchers to display.</p>

            </div>
            <div class="col-md-6"></div>

          </div>


        </section>
      </div>
    </div>
  </div>
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
