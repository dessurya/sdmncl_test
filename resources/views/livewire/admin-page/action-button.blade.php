<div id="actionButton">
	<div style="position: absolute; top: 0; right: 0;">
		<div class="btn-group" role="group" aria-label="Basic example">
			@foreach($button as $item)
			<button title="{{ $item['title'] }}" 
			data-action="{{ $item['action'] }}"
			data-select="{{ $item['select'] }}"
			data-confirm="{{ $item['confirm'] }}"
			data-multiple="{{ $item['multiple'] }}"
			type="button" class="btn btn-secondary">
				<i class="fa fa-{{ $item['icon'] }}"></i>
			</button>
			@endforeach
			<button title="Sign Out" 
			data-action="logout"
			data-select="false"
			data-confirm="false"
			data-multiple="false"
			type="button" class="btn btn-secondary">
				<i class="fa fa-sign-out"></i>
			</button>
		</div>
	</div>
</div>
