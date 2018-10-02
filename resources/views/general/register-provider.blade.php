@extends('layouts.app')

@section('squiggle-box')
<div class="container">
    <div class="cs-contrast-box text-left">
        <h1 class="cs text-center">Childcarer Registration</h1>
        @include('forms.register')
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
    <script>
jQuery('body').find('*[name]').each(function (k,v) {
    console.log(v.name);
});
    </script>
@endsection

@section('modals')
    {{-- Add modal markup here --}}
@endsection