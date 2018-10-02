@extends('layouts.employer')

@section('content')

<div class="cs-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <section>
                    <h1>Employees</h1>
                         @if (session('redirect_message'))
                        <div class="alert alert-success">
                            {{ session('redirect_message') }}
                        </div>
                        @endif

                        @if (session('error_message'))
                        <div class="alert alert-success">
                            {{ session('error_message') }}
                        </div>
                        @endif

                    <hr>

                    <div class="row">
                        <div class="col-md-3">

                            {{-- Search --}}
                            <form action="#" method="GET">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <label for="search" class="sr-only">Search For</label>
                                    <input id="search" name="search" type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button role="button" class="btn btn-default" type="submit">Go!</button>
                                    </span>
                                </div>
                            </form>

                        </div>
                        <div class="col-md-2">

                            {{-- Filter --}}
                            <div class="btn-group btn-block">
                                <button type="button" class="btn btn-block btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Add Filter <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu btn-block">
                                    <li>
                                        <a title="Remove Filters" href="#">None</a>
                                        <a title="List inactive employees" href="#">Inactive</a>
                                        <a title="List active employees" href="#">Active</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <a href="{{ url('employer/employee-invitation') }}" role="button" title="Invite employees page" class="btn btn-default btn-block">Invite Employees</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#" role="button" title="Export all employees to csv" class="btn btn-default btn-block">CSV Export</a>
                        </div>

                        <div class="col-md-3">


                     <div class="row">
                    
                       <div class="col-md-12 form-inline text-right">
                       <label>Rows per page:</label>
                           <select class="form-control">
                               <option>25</option>
                               <option>50</option>
                               <option>100</option>
                               <option>150</option>
                           </select>
                           <input type="submit" class="btn btn-default" value="Go">
                     
                       </div>
            
                        
                    </div>

                    </div>

                    </div>
               
                    <hr>



                    <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                        <thead>
                            <tr>
                                <th colspan="1">Payroll Number</th>
                                <th colspan="1">Name</th>
                                <th colspan="1">Email</th>
                                <th colspan="1">Salary Sacrifice Amount</th>
                                <th colspan="1">BEA Banda Description</th>
                                <th colspan="1"></th>

                            </tr>
                        </thead>
                        <tbody>    
                            @forelse($employees as $employee)
                            <tr>
                                <td>{{ $employee->payroll_number or '' }}</td>
                                <td>{{ $employee->first_name or '' }} {{ $employee->last_name or '' }}</td>
                                <td>{{ $employee->email_address or '' }}</td>
                                <td>{{ $employee->amount or '' }}</td>
                                <td>{{ $employee->bea_description or '' }}</td>
                                <td class="text-right">
                                    <a href="{{ url('employer/remove-employee/'.$employee->id_beneficiary_mandate)}}" title="Delete employee" role="button" class="btn btn-sm btn-danger">Remove</a>
                                    <a href="{{ url('employer/employee-details/'.$employee->id_beneficiary_mandate) }}" title="More employee information" role="button" class="btn btn-sm btn-success">Edit</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center"><b>No Employees to List</b></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>


                    <div class="cs-pagination text-center">
                        
                    </div>

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
