<div>
	<div id="footer" class="openSection">
		<div class="container">
			<div class="row">
				<div class="col">
					<center>
						<img height="180px" src="{{ asset('picture/_default/LOGO MUNCUL NIGERIA DAN MUNCUL MEKAR.png') }}">
						<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
						@foreach($page as $item)
						@php $slug = Str::slug(strtolower($item->title), '-'); @endphp
							<a class="btn btn-outline-light" href="{{ Route($slug) }}">{{ App::getLocale() == 'id' ? $item->title_id : $item->title_en }}</a>
						@endforeach
						</div>
					</center>
				</div>
				<div class="col text-right">
					<h5>Contact Us</h5>
					<div class="container openSection-small">
						<div class="row">
							<div class="col text-right">
								<span>XXX XXXXXXXXX</span>
							</div>
							<div class="col-md-auto text-left">
								<i class="fa fa-phone"></i>
							</div>
						</div>
					</div>
					<div class="container openSection-small">
						<div class="row">
							<div class="col text-right">
								<span>XXXXXXXXX</span>
							</div>
							<div class="col-md-auto text-left">
								<i class="fa fa-facebook"></i>
							</div>
						</div>
					</div>
					<div class="container openSection-small">
						<div class="row">
							<div class="col text-right">
								<span>XXXXXXXXX</span>
							</div>
							<div class="col-md-auto text-left">
								<i class="fa fa-instagram"></i>
							</div>
						</div>
					</div>
					<div class="container openSection-small">
						<div class="row">
							<div class="col text-right">
								<span>XXXXXXXXX</span>
							</div>
							<div class="col-md-auto text-left">
								<i class="fa fa-twitter"></i>
							</div>
						</div>
					</div>
					<div class="container openSection-small">
						<div class="row">
							<div class="col text-right">
								<span>XXXXXXXXX</span>
							</div>
							<div class="col-md-auto text-left">
								<i class="fa fa-linkedin"></i>
							</div>
						</div>
					</div>
					<div class="container openSection-small">
						<div class="row">
							<div class="col text-right">
								<span>XX XXXXXXXXXXXXXX XXXXXXX XXXXXXXXXX XXXXXXX</span>
							</div>
							<div class="col-md-auto text-left">
								<i class="fa fa-map-marker"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
