@extends('layouts.employer')

@section('content')
<section>
  <div class="cs-content">
    <div class="container">

      <div class="row">
        <div class="col-md-12 ">
          <h1>Settings</h1>
        </div>

        <div class="col-md-6">
          <fieldset><legend>Account</legend>
            <div class="form-horizontal">
              <div class="form-group">
                <span id="email_label" class="col-sm-2 control-label">Email</span>
                <div class="col-sm-10">
                  <p aria-labelledby="email_label" class="form-control-static">{{ $user->email or 'employer@domain.com' }}</p>
                </div>
              </div>
            </div>

       <div class="row">
       <div class="col-md-12 ">
       <form method="post" action="{{url('employer/password-change-request')}}">        
         <button type="submit" class="btn btn-lg btn-default btn-block">Request Password Change</button>
       </form>
        
       </div>
      </div>
          <!--  @include('forms.change-email-in-modal') -->
          </fieldset>

         <!-- <fieldset><legend>Options</legend>
            @include('forms.employer-options')
          </form>
        </fieldset> -->
      </div>

      <div class="col-md-6">

       <!-- <fieldset><legend>Payroll Order</legend>
          @include('forms.payroll')
        </fieldset>

        <fieldset><legend>Global Employee Options</legend>
          @include('forms.global-employee-options')
        </fieldset> -->

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
