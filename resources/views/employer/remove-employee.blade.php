@extends('layouts.employer')

@section('content')
<section>
    <div class="cs-content">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                  <h1>Selected Employee for removal</h1>
                  <hr>

                    <fieldset><legend>Employee removal from scheme</legend>
                    <form method="POST" action="{{url('employer/remove-employee')}}">
                    <h2 class="text-danger">Are you sure you want to remove this employee?</h2>

                    <input type="hidden" name="beneficiary_id" value="{{$employee_details->beneficiary_id}}">
                  <div class="row">
                    <div class="col-md-6"><label>Remove employee before payroll</label></div>
                    <div class="col-md-6">
                      <select name="remove_date" class="form-control">
                      <option value="">Please Select</option>

                      @foreach($future_payroll_dates as $date)
                      <option value="{{$date->payroll_date}}">{{$date->date}}</option>
                      @endforeach
                   
                    </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6"><label>Payroll Number</label></div>
                    <div class="col-md-6">{{$employee_details->payroll}}</div>
                  </div>
                  <div class="row">
                    <div class="col-md-6"><label>Name</label></div>
                    <div class="col-md-6">{{$employee_details->first_name." ".$employee_details->last_name}}</div>
                  </div>
                  <div class="row">
                    <div class="col-md-6"><label>Email Address</label></div>
                    <div class="col-md-6">{{$employee_details->email}}</div>
                  </div>
                  <div class="row">
                    <div class="col-md-6"><label>Salary Sacrifice Amount(£)</label></div>
                    <div class="col-md-6">{{$employee_details->amount}}</div>
                  </div>
                  <div class="row">
                    <div class="col-md-6"><label>Gifting Amount (£)</label></div>
                    <div class="col-md-6">{{$employee_details->gift}}</div>
                  </div>
                  <div class="row">
                    <div class="col-md-6"><label>Pre-April</label></div>
                    <div class="col-md-6"><input type="checkbox" name="preapril"></div>
                  </div>
                  <div class="row">
                    <div class="col-md-6"><label>Reason for removing from scheme*</label></div>
                    <div class="col-md-6">
                    <select name="remove_reason" class="form-control">
                      <option value="">Please Select</option>
                    @foreach($leaving_reasons as $reason)
                      <option value="{{ $reason->description}}">{{ $reason->description}}</option>
                    @endforeach

                    </select>

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                  
                  <div class="pull-right">
                    <input type="submit" class="btn btn-primary" value="Remove Employee">
                    </div>
                    
                  </div>
                  

                    </form>
                    <div class="row">
                    <a href="{{ url('employer/employee-list')}}"><button class="btn btn-default">Cancel</button></a>
                    </div>
                    <div class="row">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                         @endif
                    </div>

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
