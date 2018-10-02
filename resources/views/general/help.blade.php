@extends('layouts.login')

@section('content')

  <div class="cs-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <section>
            <h1>FAQs</h1>

            <h2>Section 1: About this site</h2>
            <div class="panel-group cs" id="section1_accordion" role="tablist" aria-multiselectable="true">

            </div>

            <hr>

            <h2>Section 2: How to join</h2>
            <div class="panel-group cs" id="section2_accordion" role="tablist" aria-multiselectable="true">

            </div>

            <hr>

            <h2>Section 3: Can I make money this site?</h2>
            <div class="panel-group cs" id="section3_accordion" role="tablist" aria-multiselectable="true">


            </div>
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
