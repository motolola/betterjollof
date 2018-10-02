@extends('layouts.employer')

@section('content')

<div class="cs-content">
    <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Outstanding Required Tasks</h1>
                    <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                        <thead>
                            <tr>
                                <th colspan="1">Task ID</th>
                                <th colspan="1">Description</th>
                                <th colspan="1">Task Date</th>
                            </tr>
                        </thead>
                        <tbody>    
                            @forelse($tasks as $task)
                            <tr>
                                <td>{{ $task->task_id }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->task_created }}</td>

                            </tr>
                            @empty
                            <tr>
                                <td class="text-center"><b>No Requests</b></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

{{-- 
            <div class="row">
                <div class="col-md-12">
                    <div class="cs-task-block">
                        <h2 class="cs">
                            Terms and Conditions of Agreement<br>
                            <small>Standard Agreement</small>
                        </h2>

                        <div class="alert alert-info">
                            <p>Please accept the terms of agreement.</p>
                        </div>

                        <form class="form" role="form" method="POST" action="{{ url('parent/accept-terms-conditions') }}">
                            {{ csrf_field() }}

                            <div class="cs-scroll">
                                <p>Sed elit quam, ornare ut gravida nec, vestibulum nec magna. Aenean lobortis non augue eget lobortis. Praesent eleifend magna diam, sed ultrices ipsum consectetur accumsan. Mauris pretium tortor in ante accumsan, vitae lacinia eros luctus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                <p>Morbi a malesuada turpis. In rhoncus vitae quam egestas ornare. Phasellus efficitur urna non turpis dignissim, ut congue felis aliquet. Mauris porta eros ac ligula consectetur, at molestie tellus fringilla. Integer ac mauris sodales, varius mi a, malesuada felis. Ut eu porta dui, sit amet ultricies enim. Nunc non erat faucibus, laoreet urna et, rhoncus ligula. Nam vel ipsum varius nibh eleifend ultricies ut sit amet arcu.</p>
                                <p>Sed elit quam, ornare ut gravida nec, vestibulum nec magna. Aenean lobortis non augue eget lobortis. Praesent eleifend magna diam, sed ultrices ipsum consectetur accumsan. Mauris pretium tortor in ante accumsan, vitae lacinia eros luctus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                <p>Morbi a malesuada turpis. In rhoncus vitae quam egestas ornare. Phasellus efficitur urna non turpis dignissim, ut congue felis aliquet. Mauris porta eros ac ligula consectetur, at molestie tellus fringilla. Integer ac mauris sodales, varius mi a, malesuada felis. Ut eu porta dui, sit amet ultricies enim. Nunc non erat faucibus, laoreet urna et, rhoncus ligula. Nam vel ipsum varius nibh eleifend ultricies ut sit amet arcu.</p>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input name="terms" id="terms" type="checkbox"> I agree to the above terms.
                                </label>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button id="js-submit-terms" disabled type="button" class="btn btn-primary">
                                        Submit
                                    </button>                                
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h2 class="cs">
                        Payroll Settings
                    </h2>
                    <div class="alert alert-info">
                        <p>Please setup your payroll options.</p>
                    </div>
                    @include('forms.payroll')
                </div>

            </div> --}}


    </div>
</div>
@endsection

@section('additional_style')
{{-- Add custom stylesheet links here --}}
@endsection

@section('additional_script')
{{-- Add custom javascript links here --}}
<script>
    jQuery('#terms').on('change', function() {
        jQuery('#js-submit-terms').prop('disabled', ! this.checked);
    })

    jQuery('#js-submit-terms').on('click', function (e) {
        e.preventDefault();
        jQuery(this).parents('.cs-task-block').first().remove();
    })
</script>
@endsection

@section('modals')
{{-- Add modal markup here --}}
@endsection
