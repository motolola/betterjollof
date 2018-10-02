@extends('layouts.parent')

@section('squiggle-box')
  <div class="cs-contrast-box">
    <header class="text-uppercase">
      <h1>Childcare Vouchers</h1>
      <h2>Parent Area</h2>
    </header>
    <p>Demo Site - Still in Development</p>
    <a href="#" class="btn btn-lg cs-btn-ghost dark text-uppercase" data-toggle="modal" data-target="#employerHome">
      Find out more...
    </a>
  </div>
@endsection

@section('content')
  <section>
    <div class="cs-content">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">

            <article>
              <h1 class="">Hello {{ $managed_beneficiary->first_name}} {{ $managed_beneficiary->last_name}} (Parent Number: {{ $managed_beneficiary->beneficiary_id}})</h1>
              <p class="lead">Account Balance: &#163;{{ $balance}}</p>
              <p class="lead">Welcome to the Childcare site</p>

              <div class="row">
                <div class="col-md-12">
                  <h2> Tasks </h2>
                  @if($tasks)
                  <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                    <thead>
                      <tr>
                        <th>Description</th>
                        <th >Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($tasks as $task)
                        <tr>
                          <td>{{ $task->description }}</td>
                          <td>
                            <a href="{{url($task->url)}}"><button class="btn btn-default">Go to Task</button></a>
                          </td>
                        </tr>
                      @endforeach

                    </tbody>
                  </table>
                @else
                  <div class="alert alert-info">
                    You currently have no tasks to complete.
                  </div>
                @endif
                </div>
              </div>
              <div class="row">
                <h2> Statement </h2>
                <div class="col-md-12">

                  <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                    <thead>
                      <tr>
                        <th>Statement</th>
                        <th ></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>Parent Number</th>
                        <td>{{ $managed_beneficiary->beneficiary_id}}</td>
                      </tr>
                      <tr>
                        <th>Curent Balance</th>
                        <td>&#163;{{ $statement->current_balance}}</td>
                      </tr>

                      <tr>
                        <th>Next Payroll</th>
                        <td>{{ $statement->next_payroll or 'Date not available' }}</td>
                      </tr>
                      <tr>
                        <th>My Employer</th>
                        <td>{{ $active_client->company_name or ''}}</td>
                      </tr>

                      <tr>
                        <th>Number of Children</th>
                        <td>{{ $statement->children_count}}</td>
                      </tr>
                      <tr>
                        <th>Summary</th>
                        <td>{{ $statement->summary}}</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6 col-md-3">
                  <a href="{{ route('parent-child-care') }}"title="My providers link" class="cs-icon-link"><i class="cs-icon icon-sodexo-suppliers"></i> My Providers</a>
                </div>
                <div class="col-xs-6 col-md-3">
                  <a href="{{ route('parent-vouchers') }}" title="my vouchers" class="cs-icon-link"><i class="cs-icon icon-sodexo-voucher"></i> My Vouchers</a>
                </div>
                <div class="col-xs-6 col-md-3">
                  <a href="{{ route('parent-spend-vouchers') }}" title="Spend my vouchers link" class="cs-icon-link"><i class="cs-icon icon-sodexo-holding-voucher"></i> Spend My Vouchers</a>
                </div>
                <div class="col-xs-6 col-md-3">
                  <a href="{{ route('parent-family') }}"title="My family link" class="cs-icon-link"><i class="cs-icon icon-sodexo-family"></i> My Family</a>
                </div>
              </div>


              <br><br>
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
