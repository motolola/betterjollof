@extends('layouts.parent')

@section('squiggle-box')
@endsection

@section('content')
  <div class="cs-content">

    <div class="container">

      <div class="row">

        <div class="col-md-12">
          <h1 class="text-uppercase">My Family</h1>

          <hr>

          <div class="panel-group cs" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading dropdown" role="tab" id="children">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseChildren" aria-expanded="true" aria-controls="collapseChildren">
                  <h4 class="panel-title">View or Add Children <span class="caret"></span></h4>
                </a>
              </div>
              <div id="collapseChildren" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="children">
                <div class="panel-body">
                  <div class="text-right">
                    <a href="{{ url('/parent/child-add') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add Child</a>
                  </div>
                  <hr>
                  @include('parts.parent-family-children')
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="requests">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseRequests" aria-expanded="false" aria-controls="collapseRequests">
                  <h4 class="panel-title">Accept/Reject Family Accounts Requests</h4>
                </a>
              </div>
              <div id="collapseRequests" class="panel-collapse collapse" role="tabpanel" aria-labelledby="requests">
                <div class="panel-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt atque alias, itaque. Repellat ullam itaque sapiente debitis earum possimus officia fugit architecto blanditiis, dolores non amet, nesciunt quae dolorum sunt.</p>
                  @include('parts.parent-family-requests')
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="requestsMade">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseRequestsMade" aria-expanded="false" aria-controls="collapseRequestsMade">
                  <h4 class="panel-title">View or Cancel Family Accounts Request Made</h4>
                </a>
              </div>
              <div id="collapseRequestsMade" class="panel-collapse collapse" role="tabpanel" aria-labelledby="requestsMade">
                <div class="panel-body">
                  @include('parts.parent-family-requests-made')
                </div>
              </div>
            </div>

        </div>

        <hr>

        <h2>Linked Family Accounts</h2>

        <form class="form" role="form" method="POST" action="{{url('parent/add-family-account')}}">
          <section>
            <fieldset><legend>Set Up Family Account</legend>

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">Email address</label>
                <input id="email" type="text" class="form-control" name="email" placeholder="" value="">
              </div>

              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="control-label">Username of partner</label>
                <input id="username" type="text" class="form-control" name="username" placeholder="" value="">
              </div>

              <button class="btn btn-success pull-right"><i class="icon-sodexo-family"></i> Sign up for a family account</button>

            </fieldset>
          </section>
        </form>
        <br>
        <fieldset>
          <legend>Linked Family Accounts</legend>
          @include('parts.parent-family-linked-accounts')
        </fieldset>


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
