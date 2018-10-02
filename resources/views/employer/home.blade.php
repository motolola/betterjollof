@extends('layouts.cook')
@if (session('redirect_message'))
<div class="alert alert-success">
    {{ session('redirect_message') }}
</div>
@endif

@section('squiggle-box')

@if (session('error_message'))
<div class="alert alert-success">
    {{ session('error_message') }}
</div>
@endif
<div class="row">

    <div class="col-xs-6  col-sm-3">
        <a href="{{ route('employee-list')}}" title="Link to employee list">
            <div class="cs-outer-circle animated flipInY">
                <div class="cs-inner-circle">
                    <div class="cs-circle-copy">
                        <span class="cs-circle-value">{{ $employee_count}}</span>
                        <span class="cs-circle-text">Active Employees</span>
                    </div>
                    <div class="cs-circle-foot">Manage</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xs-6  col-sm-3">
        <a href="{{ route('tasks-outstanding') }}" title="Link to outstanding tasks">
            <div class="cs-outer-circle animated flipInY animation-offset-1">
                <div class="cs-inner-circle">
                    <div class="cs-circle-copy">
                        <span class="cs-circle-value">{{ count($tasks) }}</span>
                        <span class="cs-circle-text">Pending Tasks</span>
                    </div>
                    <div class="cs-circle-foot">Manage</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xs-6  col-sm-3">
        <a href="{{ url('employer/payroll') }}" title="Link to payroll settings">
            <div class="cs-outer-circle animated flipInY animation-offset-2">
                <div class="cs-inner-circle">
                    <div class="cs-circle-copy">
                        <span class="cs-circle-value">Monthly</span>
                        <span class="cs-circle-text">Payroll Order</span>
                    </div>
                    <div class="cs-circle-foot">Change</div>
                </div>
            </div>
        </a>
    </div>


    <div class="col-xs-6  col-sm-3">
        <a href="{{ route('employer-preferences') }}" title="Link to order date settings">
            <div class="cs-outer-circle animated flipInY animation-offset-3">
                <div class="cs-inner-circle">
                    <div class="cs-circle-copy">
                        <span class="cs-circle-value">{{ $next_payroll_date }}</span>
                        <span class="cs-circle-text">Next Order Date</span>
                    </div>
                    <div class="cs-circle-foot">View</div>
                </div>
            </div>
        </a>
    </div>

</div>

@endsection

@section('content')

<div class="cs-content">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <section>
                    <h1>Change Requests</h1>

                    <form method="POST" action="{{ url('employer/mass-accept-deduction')}}">
                        @if(empty($deduction_list))
                        <div class="alert alert-success">
                            You have no outstanding change requests.
                        </div>
                        @else

                        <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                            <thead>
                                <tr>
                                    <th colspan="1">Employee</th>
                                    <th colspan="1">Payroll Number</th>
                                    <th colspan="1">Request Date</th>
                                    <th colspan="1">Request Amount</th>
                                    <th colspan="1">Change Type</th>
                                    <th colspan="1">BEA Status</th>
                                    <th colspan="1">Accept</th>
                                    <th colspan="1">View/Edit</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($deduction_list as $request)
                                <tr>
                                    <td>
                                        <b>{{ $request->first_name or null }} {{ $request->last_name or null }}</b>
                                    </td>
                                    <td>
                                        <p>{{ $request->payroll_ref or 'no description found'}}</p>
                                    </td>
                                    <td>
                                        {{ $request->requested_date or null }}
                                    </td>
                                    <td>
                                        {{ $request->amount or null }}
                                    </td>
                                    <td>
                                        {{ $request->change_description or null }}
                                    </td>
                                    <td>
                                        {{ $request->bea_description or null }}
                                    </td>
                                    <td>
                                        <input type="checkbox" name="mandate_id[]" value="{{ $request->id_pending_mandate}}">
                                    </td>
                                    <td>
                                        <a href="{{ url('employer/pending-request') }}" class="btn btn-success"> View / Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <button class="btn btn-default" type="submit">Mass Accept</button>

                    </form>

                    @endif
                </section>

            </div>

            <div class="col-md-12">
                <section>
                    <h1>Tasks</h1>

                    @if(!empty($tasks))

                    <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                        <thead>
                            <tr>
                                <th colspan="1">Task ID</th>
                                <th colspan="1">Description</th>
                                <th colspan="1">Task Date</th>
                                <th colspan="1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->task_id }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->task_created }}</td>
                                <td><a href="{{url($task->url)}}" class="btn btn-default">Go To Task</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="alert alert-success">
                            You have no outstanding change tasks.
                        </div>
                    @endif
                </section>

            </div>

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
