@extends('layouts.parent')

@section('squiggle-box')
@endsection

@section('content')
<div class="cs-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article>
			        <h1 class="cs text-center">Parent Settings</h1>
                    @if (session('redirect_message'))
                        <div class="alert alert-success">
                            {{ session('redirect_message') }}
                        </div>
                    @endif
			        @include('forms.parent-settings')
              
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