@extends('layouts.provider')

@section('content')

<div class="cs-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <section>
                    <h1>{{ $title or '404: Page Not Found' }}</h1>
                    <p class="lead"><a href="{{url('/')}}">{{ $message or 'Return to the homepage and try again.' }}</a></p>

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
