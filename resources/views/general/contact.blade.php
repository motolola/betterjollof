@extends('layouts.login')

@section('content')

	<div class="cs-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<section>

						<h1>Contact Us</h1>
						<h4>By Phone:</h4>
						<p>(Customer Care) - 999 999 9999, Open 9am - 8pm</p>
						<p>Please note – all calls are recorded for training and quality purposes</p>

						<h4>By Email:</h4>
						<p>{{ env('CONTACT_EMAIL') }}</p>

						<hr>

						<fieldset>
							<legend>Enquiry Form</legend>
							<form class="form" method="POST" action="{{url('contact')}}">
								<!-- Name input-->
								<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
									<label class="control-label" for="name">Name</label>
									<input id="name" name="name" type="text" placeholder="Your name" class="form-control" value="{{ old('name')}}">
									@if ($errors->has('name'))
										<div class="help-block cs-error">{{ $errors->first('name') }}</div>
									 @endif
								</div>

								<!-- Email input-->
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<label class="control-label" for="email">Your E-mail</label>
									<input id="email" name="email" type="text" placeholder="Your email" class="form-control" value="{{ old('email')}}">
									@if ($errors->has('email'))
										<div class="help-block cs-error">{{ $errors->first('email') }}</div>
									 @endif
								</div>

								<!-- Message body -->
								<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
									<label class="control-label" for="message">Your message</label>
									<textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5">{{old('message')}}</textarea>
									@if ($errors->has('message'))
										<div class="help-block cs-error">{{ $errors->first('message') }}</div>
									 @endif
								</div>

								<!-- Form actions -->
								<div class="form-group">
									<div class="text-right">
										<button type="submit" class="btn btn-default btn-lg">Submit</button>
									</div>
								</div>
							</form>

						</fieldset>

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
