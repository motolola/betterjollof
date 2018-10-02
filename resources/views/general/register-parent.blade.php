@extends('layouts.app')

@section('squiggle-box')


<div class="container">
    <div class="cs-contrast-box text-left">
        <h1 class="cs text-center">Parent Registration</h1>
        @include('forms.register-parent')
    </div>
</div>
@endsection

@section('content')
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
