@extends('layouts.parent')

@section('squiggle-box')
@endsection

@section('content')
<section>
    <div class="cs-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <article>
                        <h1 class="text-uppercase">My Salary sacrifice agreement</h1>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis finibus in lacus eu pharetra. Phasellus efficitur lectus urna, suscipit venenatis est pretium eu. Sed porta neque nulla, sit amet molestie eros laoreet eu. Vestibulum sit amet ornare eros. Proin ac enim quis velit dignissim volutpat ut ut elit. Duis varius, turpis non varius ullamcorper, tellus dui blandit orci, nec faucibus leo felis vel orci. Maecenas fringilla purus urna, in vulputate eros posuere sit amet.</p>


                        <form class="form" role="form" method="POST" action="{{ route('parent-terms-submit') }}">
                            {{ csrf_field() }}

                            <div class="cs-scroll">
                                <section>
                                {!! $terms_and_conditions->text !!}
                                </section>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input name="terms" id="terms" type="checkbox" value="1"> I agree to the above terms.
                                </label>

                            </div>

                            <div class="row">
                                <div class="col-md-12 text-right">
                                @if ($terms_and_conditions->needs_approval == 1)
                                    <button id="js-submit-terms" disabled type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                @endif
                                </div>

                            </div>
                        </form>
                        <div class="col-md-12 text-left">
                                @if ($terms_and_conditions->needs_approval == 0)
                                    <a href="{{url('parent/home')}}">
                                    <button class="btn btn-primary">Back</button>
                                    </a>
                                @endif
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('additional_style')
{{-- Add custom stylesheet links here --}}
@endsection

@section('additional_script')
{{-- Add custom javascript links here --}}
<script>
    jQuery('#terms').on('change', function() {
        jQuery('#js-submit-terms').prop('disabled', ! this.checked);
    })
    </script>
@endsection

@section('modals')
{{-- Add modal markup here --}}
@endsection
