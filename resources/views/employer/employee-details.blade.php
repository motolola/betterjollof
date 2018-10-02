@extends('layouts.employer')

@section('content')
<section>
<div class="cs-content">
    <div class="container">

            <div class="row">

                <div class="col-md-12">
                  <h1>Employee Details: {{$employee_details->first_name." ".$employee_details->last_name}} (Beneficiary ID: {{ $employee_details->beneficiary_id}})</h1>
                  <hr>
                </div>

                <div class="col-md-6">
                    
                    <fieldset><legend>Account</legend>

                        <div class="form-horizontal">
                            <div class="form-group">
                                <span id="email_label" class="col-sm-2 control-label">Email</span>
                                <div class="col-sm-10">
                                    <p aria-labelledby="email_label" class="form-control-static">{{ $employee_details->email or 'employee@email.com' }}</p>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#passwordResetModal">Send Password Reset Email</button>
                        {{-- Password Modal --}}
                        <div id="passwordResetModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel">
                          <div class="modal-dialog ">

                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h2 class="modal-title" id="changePasswordModalLabel">Resend Password Reset Email?</h2>
                              </div>
                              <div class="modal-body">    
                                <form role="form" method="POST" action="#">
                                  <div class="form-group text-right">
                                    <button role="button" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button role="button" type="submit" class="btn btn-primary">Send</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        {{-- End Password Modal --}}

                        <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#changeEmailModal">Change Email</button>
                        {{-- Email Modal --}}
                        <div id="changeEmailModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="changeEmailModalLabel">
                          <div class="modal-dialog ">

                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h2 class="modal-title" id="changeEmailModalLabel">Change Email</h2>                                
                              </div>
                              <div class="modal-body">    
                                <p><b>Current: {{ $employerEmail or 'employer@domain.com' }}</b></p>
                                <form role="form" method="POST" action="#">
                                  <div class="form-group">
                                    <label for="new_email">New Email</label>
                                    <input type="password" class="form-control" id="new_email" name="new_email" placeholder="New Email">
                                  </div>
                                  <div class="form-group text-right">
                                    <button role="button" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button role="button" type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        {{-- End Email Modal --}}


                    </fieldset>

                </div>
                <div class="col-md-6">  

                    <fieldset><legend>Employee Options</legend>
                  {{ dump($scheme_options) }}
                        <form role="form" method="POST" action="#">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="employee_options[]" value="option1">
                                Enable Option 1
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="employee_options[]" value="option2">
                                Enable Option 2
                              </label>
                            </div>
                              <div class="form-group text-right">
                                <button role="button" type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                        </form>
                    </fieldset>

                </div>


            </div>
            <div class="row">
            <div class="col-md-6">  

                    <fieldset><legend>Employee Details</legend>
            
                        <form role="form" method="POST" action="#">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="employee_options[]" value="option1">
                                Enable Option 1
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="employee_options[]" value="option2">
                                Enable Option 2
                              </label>
                            </div>
                              <div class="form-group text-right">
                                <button role="button" type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                        </form>
                    </fieldset>

                </div>
                <div class="col-md-6">  

                    <fieldset><legend>Remove Employee</legend>
                        <form role="form" method="POST" action="#">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="employee_options[]" value="option1">
                                Enable Option 1
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="employee_options[]" value="option2">
                                Enable Option 2
                              </label>
                            </div>
                              <div class="form-group text-right">
                                <button role="button" type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
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
