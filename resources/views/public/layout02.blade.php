@extends('public.base')

@section('title')
Home Page
@endsection


@section('js')
@endsection

@section('css')
<style type="text/css">
	.card{
		position: relative; margin: auto; width: 18rem;
		margin-bottom: 10px;
	}
	.card .img{
		position: relative;
		width: 100%; height: 180px;
		background-attachment: local;
		background-position: center;
		background-repeat: no-repeat;
		background-size: contain;
	}
</style>
@endsection

@section('content')
<div id="full-img" class="d-table" style="background-image: url('{{ asset($page->picture) }}');">
	<div class="d-table-row">
		<div class="d-table-cell vertical-align">
			<center><h4>{{ App::getLocale() == 'id' ? $page->title_id : $page->title_en }}</h4></center>
		</div>
	</div>
</div>
<div class="container openSection">
	<div class="row">
		<p>
			{{ App::getLocale() == 'id' ? $page->content_id : $page->content_en }}
		</p>
	</div>
</div>
<div class="container openSection">
	<div class="row">
		@foreach($items as $item)
		<div class="card">
			<div class="img" style="background-image: url('{{ asset($item->picture) }}');"></div>
			<div class="card-body">
				<h5 class="card-title">{{ App::getLocale() == 'id' ? $item->title_id : $item->title_en }}</h5>
				<p class="card-text">{{ App::getLocale() == 'id' ? Str::words($item->content_id, 30 , '...') : Str::words($item->content_en, 30 , '...') }}</p>
				<a href="#" class="btn btn-outline-primary">View More</a>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection