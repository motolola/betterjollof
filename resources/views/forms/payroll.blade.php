
<form role="form" method="POST" action="{{ url('#') }}">

  <div class="form-group{{ $errors->has('payroll_schedule') ? ' has-error' : '' }}">
    <label for="payroll_schedule" class="control-label">Payroll Order</label>
    <select id="payroll_schedule" class="form-control" name="payroll_schedule">
      <option>Please select</option>
      <option value="monthly">Monthly</option>
      <option value="weekly">Weekly</option>
    </select>
  </div>


  <div class="row ">
    <div class="col-md-6">
    <p><strong>Next Order Date: <span class="text-danger">Unknown</span></strong></p>
    </div>
    <div class="col-md-6 text-right">
      <button role="button" type="submit" class="btn btn-success">Save changes</button>
    </div>

  </div>
</form>