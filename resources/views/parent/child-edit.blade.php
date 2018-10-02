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
            <h1 class="text-uppercase">Edit Child Details</h1>

         
            <div class="row">
              <div class="col-md-12">
                <form class="form" role="form" method="POST" action="{{ url('parent/child-edit-action/'.$child['id_child']) }}">
               <section>
                    <fieldset><legend>Edit Child</legend>
                    <input type="hidden" name="beneficiary_id" value="{{$child['beneficiary_id']}}" >

                      <p>This information is only used to ensure that your Tax/NI exemption is in accordance with HMRC scheme rules.</p>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="control-label">First Name</label>
                            <input id="first_name" type="text" class="form-control" name="first_name" placeholder="" value="{{$child['firstname'] or ''}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="control-label">Last Name</label>
                            <input id="last_name" type="text" class="form-control" name="last_name" placeholder="" value="{{$child['lastname'] or ''}}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group{{ $errors->has('day_of_birth') ? ' has-error' : '' }}">
                              <label for="day_of_birth" class="control-label">Day of Birth</label>
                              <Select id="day_of_birth"  class="form-control" name="day_of_birth" value="">
                              <option value="{{ $child['day_of_birth'] or ''}}">{{ $child['day_of_birth'] or 'Please select'}}</option>
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
                                <option value="{{ $child['month_of_birth'] or ''}}">{{ $child['month_of_birth'] or 'Please select'}}</option>
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
                                
                                @foreach(range((date("Y")-14), date("Y")) as $i)
                                
                                  <option @if($i == $child['year_of_birth']) selected @endif value="{{ $i }}">{{ $i }}</option>
                                @endforeach
                              </Select>
                            </div>
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('registered_disabled') ? ' has-error' : '' }}">
                        <label for="registered_disabled" class="control-label">Registered Disabled?</label>
                        <Select id="registered_disabled"  class="form-control" name="registered_disabled" value="">
                          <option value="1">Please Choose</option>
                          <option @if($child['registered_disabled'] == 1) selected @endif value="1">Yes</option>
                          <option @if(($child['registered_disabled']) == 0 || ($child['registered_disabled'] == null)) selected @endif value="0">No</option>
                        </Select>
                      </div>
                      <div class="form-group{{ $errors->has('relationship') ? ' has-error' : '' }}">
                        <label for="relationship" class="control-label">Relationship?</label>
                        <Select id="relationship"  class="form-control" name="relationship" value="">
                          <option value="Unknown">Please Choose</option>
                          <option @if($child['relationship'] == "Parent") selected @endif value="Parent">Parent</option>
                          <option @if($child['relationship'] == "Step-parent") selected @endif value="Step-parent">Step-parent</option>
                          <option @if($child['relationship'] == "Parental responsibility, lives with me") selected @endif value='Parental responsibility, lives with me'>Parental responsibility, lives with me</option>
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
