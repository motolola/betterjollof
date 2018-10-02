@extends('layouts.provider')

@section('squiggle-box')
@endsection

@section('content')
<div class="cs-content">
    <div class="container">

        <div class="col-md-12">
            <section>
                <h1 class="text-uppercase">My Vouchers <span class="text-danger">(Page Under Construction)</span></h1>

                <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                    <thead>
                        <tr>
                            <th colspan="1">Name</th>
                            <th colspan="1">Date Of Birth</th>
                            <th colspan="2">Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($vouchers as $voucher)    
                    {{ dump($voucher)}}
                        <tr>
                            <td>Baby Name</td>
                            <td>6th January 2014</td>
                            <td>Male</td>
                            <td class="text-right">
                                <a href="#" title="edit information" role="button" class="btn btn-sm btn-danger">remove</a>

                                <a href="{{ url('/parent/child-edit') }}" title="edit information" role="button" class="btn btn-sm btn-success">Edit</a>
                            </td>
                        </tr>
                    @empty
                    <tr><td>No vouchers available</td></tr>                    
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
