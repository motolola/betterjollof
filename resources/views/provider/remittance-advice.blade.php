@extends('layouts.app')

@section('banner')
<div class="block dark">
    <div class="jumbotron cs-bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <header class="text-uppercase">
                        <h1>Remittance Advice Page</h1>
                        <h2>Contents to be added ...</h2>
                    </header>
                    <a href="#" class="btn btn-lg cs-btn-ghost text-uppercase">
                        Find out more...
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<section>
<div class="cs-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <article>
                    <h1 class="text-uppercase">Remittance Advice Page</h1>
                    <p class="lead">Provider Home Page</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis finibus in lacus eu pharetra. Phasellus efficitur lectus urna, suscipit venenatis est pretium eu. Sed porta neque nulla, sit amet molestie eros laoreet eu. Vestibulum sit amet ornare eros. Proin ac enim quis velit dignissim volutpat ut ut elit. Duis varius, turpis non varius ullamcorper, tellus dui blandit orci, nec faucibus leo felis vel orci. Maecenas fringilla purus urna, in vulputate eros posuere sit amet.</p>
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
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
      Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body text-center">
                <img src="https://unsplash.it/600/200/?random" class="img-responsive">
                <artcle>
                    <h1>Modal Title</h1>
                    <p class="lead">Curabitur a felis ac lectus finibus vestibulum. Aenean urna lorem, placerat quis metus at, laoreet iaculis tortor. Donec libero felis, sagittis in egestas quis, venenatis eu turpis.</p>
                </artcle>
                <a href="#" class="btn btn-lg cs-btn-ghost text-uppercase black">
                    Find out more...
                </a>
          </div>
        </div>
      </div>
    </div>
@endsection
