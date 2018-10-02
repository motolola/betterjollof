@extends('layouts.app')

@section('content')
{{-- @if (session('redirect_message'))
<div class="alert alert-success">
    {{ session('redirect_message') }}
</div>
@endif
@if (session('error_message'))
<div class="alert alert-danger">
    {{ session('error_message') }}
</div>
@endif --}}

<div class="cs-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <section>
                {!! $terms_and_conditions->text !!}
                </section>


                @if ($terms_and_conditions->needs_approval == 1)
                <form method="POST" action="{{url('employer/accept-terms')}}" class="form-inline">
                <input type="hidden" name="ts_and_cs" value="{{$terms_and_conditions->ts_and_cs}}">
                    <input type="submit" value="Accept Terms and conditions" class="btn btn-default pull-right">
                </form>
                @elseif ($terms_and_conditions->needs_approval == 0)



                <div>
                    <h4 class="pull-right"><strong>You have accepted our Terms and Conditions!</strong></h4>
                    <a href="{{url('employer/home')}}"><button class="btn btn-default">Back to Homepage</button></a>
                </div>
                @endif

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
