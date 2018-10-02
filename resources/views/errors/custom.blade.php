@extends('layouts.app')

@section('content')

<div class="cs-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <section>
                    <h1>{{ $title or 'An Error Has Occured' }}</h1>
                    <p class="lead">{{ $message or 'Return to the homepage and try again.' }}</p>

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
