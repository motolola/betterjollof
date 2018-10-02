@extends('layouts.employer')

@section('content')
<section>
    <div class="cs-content">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                  <h1>Client Payroll</h1>
                  <hr>

                    <fieldset><legend>Payroll</legend>

                        <form method="POST" action="{{ url('employer/payroll')}}">                            
                          <div class="form-group">
                            <label for="schedule_id">Schedule</label>
                            <select name="schedule_id">
                              <option value="">Please Select</option>
                              <option value="7">Weekly</option>
                              <option value="9">Every four weeks</option>
                              <option value="8">Forthnighly</option>
                              <option value="2">Last working day</option>
                              <option value="1">Specific day</option>
                              
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="payroll_date">Payroll Date</label>
                            <input type="text" class="form-control" id="payroll_date" placeholder="example">
                          </div>
                          <div class="form-group text-right">
                            <button role="button" type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>

                    </fieldset>



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
