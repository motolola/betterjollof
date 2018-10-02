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
            <h1>Find Carer </h1>
          </article>
          <p class="lead">If your childcare provider is already registered with Sodexo, you can search and add them to your account below.

            If your provider isn't registered with us, you can encourage them to join the Sodexo childcare voucher provider network by clicking here to print a registration form. Simply ask them to complete the form and post or fax it back to us, and we'll take care of the rest.</p>
          </div>
        </div>
        <form method="POST">
        <fieldset>
          <legend>Search for a Childcare Provider</legend>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('provider_id') ? ' has-error' : '' }}">
                <label for="provider_id" class="control-label">childcare Provider ID</label>
                <input id="provider_id" type="text" class="form-control" name="provider_id" placeholder="" value="">
                @if ($errors->has('provider_id')) <div class="help-block cs-error">{{ $errors->first('provider_id') }}</div> @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                <label for="postcode" class="control-label">Postcode</label>
                <input id="postcode" type="text" class="form-control" name="postcode" placeholder="" value="">
                @if ($errors->has('postcode')) <div class="help-block cs-error">{{ $errors->first('postcode') }}</div> @endif
              </div>
            </div>
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-default">Search</button>
            </div>
          </div>
        </fieldset>
        </form>

        @if($carer)
        <fieldset>
        <legend>Childcare Provider Found</legend>
          <div class="row">
            <div class="col-md-3">
              <b>{{ Helper::upperCase($carer->name) }}</b>
            </div>
            <div class="col-md-3">
              @foreach($carer_address as $key=>$val)
              <div>{{ Helper::upperCase($val) }}</div>
              @endforeach
            </div>
            <div class="col-md-3">
              {{ Helper::upperCase($carer->phone) }}
            </div>
            <div class="col-md-3 text-right">
              <a class="btn btn-default" href="{{ url('parent/provider-add?carer='.$carer_id) }}">Add Carer</a>
            </div>
          </div>
          @endif

{{--         @if($carer)
        <hr />
        <div class="row">
          <div class="col-md-12">
            <div>{{ ucwords(strtolower($carer->name)) }}</div>
            @if(strlen($carer->address1))
            <div>{{ ucwords(strtolower($carer->address1)) }}</div>
            @endif
            @if(strlen($carer->address2))
            <div>{{ ucwords(strtolower($carer->address2)) }}</div>
            @endif
            @if(strlen($carer->address3))
            <div>{{ ucwords(strtolower($carer->address3)) }}</div>
            @endif
            @if(strlen($carer->address4))
            <div>{{ ucwords(strtolower($carer->address4)) }}</div>
            @endif
            @if(strlen($carer->address5))
            <div>{{ ucwords(strtolower($carer->address5)) }}</div>
            @endif
            @if(strlen($carer->post_town))
            <div>{{ ucwords(strtolower($carer->post_town)) }}</div>
            @endif
            @if(strlen($carer->county))
            <div>{{ ucwords(strtolower($carer->county)) }}</div>
            @endif
            @if(strlen($carer->post_code))
            <div>{{ $carer->post_code }}</div>
            @endif
            <br />
            @if(strlen($carer->phone))
            <div>{{ ucwords(strtolower($carer->phone)) }}</div>
            @endif
          </div>
          <div class="col-md-12 text-center">
            <a class="btn btn-default" href="{{ url('parent/provider-add?carer='.$carer->carer_id) }}">Add Carer</a>
          </div>
        </div>
        @endif --}}
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
