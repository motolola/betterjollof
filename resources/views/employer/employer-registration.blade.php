@extends('layouts.parent')

@section('squiggle-box')
@endsection

@section('content')
<div class="cs-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article>
			               <h1 class="cs text-center">Client Registration Issue</h1>

                    <p class="lead alert alert-danger">There was an issue with your initial registration data, please fill out and submit the form below to proceed.</p>
                    @include('forms.register-employer-benificiary')

                </article>
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