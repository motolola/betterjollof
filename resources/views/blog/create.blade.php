@extends('layouts.food')

@section('page_title')
    Create blog
@endsection

@section('squiggle-box')

    <div class="row">
        @include('food.search')
    </div>

@endsection

@section('content')
    <div class="cs-content">
        <div class="container">
           <div class="uk-panel">
               <div class="uk-panel-body">

                   <div class="uk-child-width-1-7 uk-text-center" uk-grid>
                       <div>
                           <div class="uk-card uk-card-default uk-card-body">

                               <form>
                                   <fieldset class="uk-fieldset">

                                       <div class="uk-margin">
                                           <label class="uk-align-left">Blog Title</label>
                                           <input class="uk-input" type="text" placeholder="Blog title">
                                       </div>

                                       <div class="uk-margin">
                                           <label class="uk-align-left">Blog Body
                                               <textarea class="uk-textarea" id="summernote"></textarea>
                                           </label>

                                       </div>

                                       <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                           <label><input class="uk-radio" type="radio" name="radio2" checked> A</label>
                                           <label><input class="uk-radio" type="radio" name="radio2"> B</label>
                                       </div>

                                       <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                           <label><input class="uk-checkbox" type="checkbox" checked> A</label>
                                           <label><input class="uk-checkbox" type="checkbox"> B</label>
                                       </div>


                                   </fieldset>
                               </form>
                           </div>
                       </div>
                       <div>

                       </div>
                   </div>


               </div>

           </div>

        </div>
    </div>

@endsection

@section('additional_style')
    {{-- Add custom stylesheet links here --}}
    <link rel="stylesheet" src="{{ URL::asset('lib/summernote/summernote.css') }}">
@endsection

@section('additional_script')
    {{-- Add custom javascript links here --}}
    <script src="{{ URL::asset('lib/summernote/summernote.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height:300,
            });
        });
    </script>


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
