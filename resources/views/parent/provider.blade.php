@extends('layouts.parent')

@section('squiggle-box')
@endsection

@section('content')
  <div class="cs-content">
    <div class="container">
      <div class="col-md-12">

        <section>
          <h1>My Childcare Providers</h1>


          <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            The childcare providers shown below are linked to your account. To make a payment, please select the provider you would like to pay, or choose 'Add Another' to add a new provider to your list.

          </div>

          <div class="row">
            <div class="col-sm-3 col-sm-offset-9">
              <a href="{{ url('parent/provider-add') }}"><button class="btn btn-info btn-block"  data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Provider</button></a>
            </div>
          </div>
          <hr>
          {{-- @if (session('redirect_message'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{ session('redirect_message') }}
            </div>
          @endif --}}


          @if($providers)

            <table class="table table-hover table-striped table-condensed table-responsive cs-table">
              <thead>
                <tr>
                  <th colspan="1">Sodexo ID</th>
                  <th colspan="1">Name</th>
                  <th colspan="1">Address</th>
                  <th colspan="2">Postcode</th>
                </tr>
              </thead>
              <tbody>
                @foreach($providers as $provider)
                  <tr>
                    <td>{{ $provider->ca_ref}}</td>
                    <td>{{ ucwords(strtolower($provider->carer_name)) }}</td>
                    <td>{{ ucwords(strtolower($provider->address1.' '.$provider->address2)) }}</td>
                    <td>{{ $provider->post_code}}</td>
                    <td class="text-right">
                      <a href="{{ url('/parent/my-child-care?carer='.$provider->ca_ref) }}" title="edit information" role="button" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" >remove</a>

                      <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Pay <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="{{url('parent/single-payment/'.$provider->ca_ref)}}">Single Payment</a></li>
                          <li><a href="{{url('parent/regular-payment/'.$provider->ca_ref)}}">Regular Payment</a></li>
                        </ul>
                      </div>

                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @else
            <div class="alert alert-info">No Providers Found</div>
          @endif



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
