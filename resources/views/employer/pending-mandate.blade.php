@extends('layouts.employer')

@section('content')
<div class="cs-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <section>
                    <h1>View pending request # {{ $request->id}} </h1>
                    {{ dump($request)}}
                    <form method="POST" action="{{url('/')}}">
                    <div class="row">

                    </div>
                    	


                    </form>
 
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