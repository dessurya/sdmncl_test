<div id="navigasi">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    	<li class="nav-item">
    		<a class="nav-link {{ Route::is('adminPage.base') ? 'active' : ''}}" id="self-data-tab" data-toggle="tab" href="{{ route('adminPage.base') }}" role="tab" aria-controls="self-data" aria-selected="true">Self Data</a>
    	</li>
    	@foreach($access as $item)
    	@php 
    		$baseRoute =  explode('.', $item['route']);
    		$baseRoute = $baseRoute[0].'.'.$baseRoute[1].'.';
    	@endphp
    	<li class="nav-item">
    		<a 
    			class="nav-link {{ Route::is($baseRoute.'*') ? 'active' : ''}}" 
    			id="{{ Str::slug(strtolower($item['name']), '-') }}-tab" 
    			data-toggle="tab" 
    			href="{{ route($item['route']) }}" 
    			role="tab" 
    			aria-controls="{{ Str::slug(strtolower($item['name']), '-') }}" 
    			aria-selected="true">{{ $item['name'] }}</a>
    	</li>
    	@endforeach
    </ul>
</div>
