@extends('layouts.parent')

@section('squiggle-box')
@endsection

@section('content')
<section>
  <div class="cs-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <article>


            <div class="row">
              <div class="col-md-12">
                <h1>Add a Child</h1>
                <form class="form" role="form" method="POST" action="{{ url('parent/child-add') }}">
                  <section>
                    <fieldset><legend>Add Child Form</legend>

                      <p>This information is only used to ensure that your Tax/NI exemption is in accordance with HMRC scheme rules.</p>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="control-label">First Name</label>
                            <input id="first_name" type="text" class="form-control" name="first_name" placeholder="" value="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="control-label">Last Name</label>
                            <input id="last_name" type="text" class="form-control" name="last_name" placeholder="" value="">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group{{ $errors->has('day_of_birth') ? ' has-error' : '' }}">
                              <label for="day_of_birth" class="control-label">Day of Birth</label>
                              <Select id="day_of_birth"  class="form-control" name="day_of_birth" value="">
                              <option>Please select</option>
                                @foreach($days as $i)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endforeach
                              </Select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group{{ $errors->has('month_of_birth') ? ' has-error' : '' }}">
                              <label for="month_of_birth" class="control-label">Month of Birth</label>
                              <Select id="month_of_birth"  class="form-control" name="month_of_birth" value="">
                                <option>Please select</option>
                                @foreach ($months as $month)
                                     <option value="{{ $month[0] }}">{{ $month[1] }}</option>
                                @endforeach


                              </Select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group{{ $errors->has('year_of_birth') ? ' has-error' : '' }}">
                              <label for="year_of_birth" class="control-label">Year of Birth</label>
                              <Select id="year_of_birth"  class="form-control" name="year_of_birth" value="">
                              <option value="">{{ old('year_of_birth') ? old('year_of_birth') : 'Please select'}}</option>
                                @foreach(range((date("Y")-17), date("Y")) as $i)
                                  <option value="{{ $i }}">{{ $i }}</option>
                                @endforeach
                              </Select>
                            </div>
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('registered_disabled') ? ' has-error' : '' }}">
                        <label for="registered_disabled" class="control-label">Registered Disabled?</label>
                        <Select id="registered_disabled"  class="form-control" name="registered_disabled" value="">
                          <option value="1">Please Choose</option>
                          <option value="1">Yes</option>
                          <option value="1">No</option>
                        </Select>
                      </div>
                      <div class="form-group{{ $errors->has('relationship') ? ' has-error' : '' }}">
                        <label for="relationship" class="control-label">Relationship?</label>
                        <Select id="relationship"  class="form-control" name="relationship" value="">
                          <option value="">Please Choose</option>
                          <option value="Parent">Parent</option>
                          <option value="Step-parent">Step-parent</option>
                          <option value='Parental responsibility, lives with me'>Parental responsibility, lives with me</option>
                        </Select>
                      </div>


                      <div class="row">
                        <div class="col-md-4 col-md-offset-8">
                          <button class="btn btn-default btn-block btn-lg">Add  <i class="fa fa-chevron-right"></i></button>
                        </div>
                      </div>

                    </fieldset>
                  </section>

                </form>

              </div>
            </div>
          </article>
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
