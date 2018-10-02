@extends('layouts.food')

@section('page_title')
    Preview blog
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

                <div class="col-md-12">
                    @include('flash::message')
                    <h1 class="text-capitalize">Blog list</h1>
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
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
        });
    </script>
    {{-- Add modal markup here --}}
@endsection
