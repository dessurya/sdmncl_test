<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    	<a class="navbar-brand" href="{{ route('home') }}">
			<img height="50px" src="{{ asset('picture/_default/LOGO MUNCUL NIGERIA DAN MUNCUL MEKAR.png') }}">
    	</a>
    	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
    	</button>

    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
    			@foreach($page as $item)
    			@php $slug = Str::slug(strtolower($item->title), '-'); @endphp
    			<li class="nav-item {{ Route::is($slug.'*') ? 'active' : '' }}">
					<a class="nav-link" href="{{ Route($slug) }}">{{ App::getLocale() == 'id' ? $item->title_id : $item->title_en }}</a>
    			</li>
    			@endforeach
    		</ul>
    	</div>

    	<form method="get" action="" class="form-inline my-2 my-lg-0 .hidden-xs-down">
    		<a class="btn btn-outline-success" href="{{ route('locale.change', ['lang' => App::getLocale() == 'id' ? 'en' : 'id' ]) }}">
    			Language {{ App::getLocale() == 'id' ? 'id' : 'en' }}
    		</a>&nbsp;
    		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    	</form>
    </nav>
</div>
