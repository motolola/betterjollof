@extends('layouts.food')
@section('page_title')
    Search result
@endsection


@section('squiggle-box')

<div class="row">

 @include('food.search')

</div>

@endsection

@section('content')

<div class="cs-content">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <section>
                    <hr>
                    @include('food.food-list-table')
                </section>

            </div>

            <div class="col-md-12">
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
