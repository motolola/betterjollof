<div class="cs-footer cs-fullwidth">
	<div class="container">
		<div class="row">
			<div class="col-sm-10">
				<ul class="list-unstyled list-inline cs-listsep">
					<li>&copy; <time>{{  date("Y")  }}</time></li>

					<!--<li>Registered in England and Wales 12345678</li>-->
				</ul>
				<ul class="list-unstyled cs-listsep">
					<li>
						<a title="Home link" href="#">Home</a>
					</li>
					{{-- <li>
						<a title="About link" href="#">About the site</a>
					</li> --}}
					<li>
						<a title="Conditions link" href="">Contact us</a>
					</li>
					<li>
						<a title="Terms and conditions link" href="#">Terms and Conditions</a>
					</li>
					{{-- <li>
						<a title="THelp link" href="{{ route('help') }}">Help</a>
					</li> --}}
{{-- 					<li>
						<a title="Privacy Link" href="#">Privacy Policy</a>
					</li> --}}
					{{-- <li>
						<a title="Accessibility Link" href="#">Accessibility</a>
					</li> --}}
                    <li>

						<a title="Complaints Procedure Link" href="/complain">Complaints Procedure</a>
                    </li>
				</ul>
			</div>
			<div class="col-sm-2 text-right">
				<img class="img-responsive" alt="Sponser Image" src="/img/holding-foot-logo.png">
			</div>
		</div>
	</div>
</div>

@include('parts.flash-message')
