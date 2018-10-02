@extends('layouts.parent')
 @if (session('redirect_message'))
      <div class="alert alert-success">
            {{ session('redirect_message') }}
       </div>
 @endif


@section('content')
<section>
  <div class="cs-content">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <article>
            <h1 class="text-uppercase">Tasks</h1>
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
@endsection

@section('modals')
{{-- Add modal markup here --}}
@endsection
