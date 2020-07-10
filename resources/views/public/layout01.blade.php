@extends('public.base')

@section('title')
Home Page
@endsection


@section('js')
@endsection

@section('css')
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
@endsection