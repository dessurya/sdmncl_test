@extends('public.base')

@section('title')
Home Page
@endsection


@section('js')
@endsection

@section('css')
<style type="text/css">
	.card{
		position: relative; margin: auto; width: 100%;
		margin-bottom: 10px;
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
	@foreach($items as $item)
	<div class="row">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">{{ App::getLocale() == 'id' ? $item->question_id : $item->question_en }}</h5>
				<p class="card-text">{{ App::getLocale() == 'id' ? $item->answer_id : $item->answer_en }}</p>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection