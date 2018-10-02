@extends('layouts.provider')

@section('squiggle-box')
@endsection

@section('content')
<div class="cs-content">
    <div class="container">

        <div class="col-md-12">
            <section>
                <h1 class="text-uppercase">My Parents</h1>

                <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                    <thead>
                        <tr>
                            <th colspan="1">Beneficiary Number</th>
                            <th colspan="1">Name</th>
                            <th colspan="1">Remittance Date</th>
                            <th colspan="1">Remittance Amount</th>
                            <th colspan="1">Latest Remittance</th>
                            <th colspan="1"></th>
                        </tr>
                    </thead>
                    <tbody>    

                        

                          @forelse($parents as $parent)
                           <tr>
                            <td>{{ $parent->beneficiary_number }}</td>
                            <td>{{ $parent->first_name." ".$parent->last_name}}</td>
                            <td>{{ $parent->latest_remittance_date or '' }}</td>
                            <td>{{ $parent->latest_remittance_amount or '' }}</td>
                            <td>{{ $parent->latest_remittance_ref or '' }}</td>
                            <td class="text-right">
                                <a href="#" title="edit information" role="button" class="btn btn-sm btn-danger">remove</a>

                                <a href="{{ url('/parent/child-edit') }}" title="edit information" role="button" class="btn btn-sm btn-success">Edit</a>
                            </td>
                        </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center"><b>No parents to display</b></td>
                            </tr>
                            @endforelse


                    </tbody>
                </table>
                <hr>
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
